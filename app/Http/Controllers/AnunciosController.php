<?php

namespace App\Http\Controllers;

use App\Modelo;
use App\Anuncio;
use App\Picture;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use DB;
use Log;

class AnunciosController extends Controller
{
    private $_languages = '';
    protected $_pictures;

    public function __construct() 
    {
        $this->_pictures = [];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daysOfWeek = [
            'Domingo' => 'Domingo',
            'Lunes' => 'Lunes',
            'Martes' => 'Martes',
            'Miercoles' => 'Miercoles',
            'Jueves' => 'Jueves',
            'Viernes' => 'Viernes',
            'Sabado' => 'Sabado'
        ];
        $path = storage_path() . "/app/country.json";
        $get_countries = json_decode(file_get_contents($path), true);
        $countries = [];
        if ($get_countries) {
            foreach ($get_countries as $c) {
                $countries[$c['Name']] = $c['Name'];
            }
        }
        unset($path,$get_countries);

        $Skin_color_model = ['fdddca'=>'fdddca','ceb4a5'=>'ceb4a5','a18d82'=>'a18d82','766860'=>'766860','4e4540'=>'4e4540','292523'=>'292523','000000'=>'000000'];

        return view('anuncios.index', compact('daysOfWeek','countries','Skin_color_model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();

            $modelo = $this->_modelo($request);
            $anuncio = $this->_anuncio($request,$modelo);
            $modelo->anuncios()->save($anuncio);

            if ($request->hasfile('Pictures_anuncio')) {
                $this->_uploads_img($request, $anuncio);
            }            

            $anuncio->pictures()->saveMany($this->_pictures);

            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            Log::error('store',['error'=>$e]);
            flash($e->getMessage())->error()->important();
            return redirect('/');
        }

        flash('Datos guardados!')->success()->important();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function _modelo(Request $request)
    {
        //$modelo = Modelo::where('E_mail_model', $request->E_mail_model)->first();
        //if (!$modelo) {
        $modelo = new Modelo();
        $modelo->Name_model = $request->Name_model;
        $modelo->Age_model = $request->Age_model;
        $modelo->E_mail_model = $request->E_mail_model;
        $modelo->Whatsappnumber = $request->Whatsappnumber;
        $modelo->Whatsappnumber2 = $request->Whatsappnumber2;
        $modelo->Hight_model = $request->Hight_model;
        $modelo->Bust_model = $request->Bust_model;
        $modelo->Waist_model = $request->Waist_model;
        $modelo->Skin_color_model = $request->Skin_color_model;
        $modelo->Address1_model = $request->Address1_model;
        $modelo->Address2_model = $request->Address2_model;
        $modelo->City_model = $request->City_anuncio;
        $modelo->Country_model = $request->Country_anuncio;

        $modelo->Language_model = $request->Language_model;
        $languages = preg_split("/[\s,|]+/", $request->Language_model);
        $this->_languages = implode(",", $languages);
        $modelo->Language_model = $this->_languages;

        $modelo->save();
        //}
        
        return $modelo;
    }

    /**
     * Display the specified resource.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function _anuncio(Request $request, Modelo $modelo)
    {
        $anuncio = new Anuncio();
        $anuncio->Name_anuncio = $request->Name_model;
        $anuncio->Date_anuncio = Carbon::now();
        $anuncio->Services_anuncio = $request->Services_anuncio;
        $anuncio->Schedule_anuncio = $request->Schedule_anuncio ? $request->Schedule_anuncio : null;
        $anuncio->Work_days_begining = $request->Work_days_begining;
        $anuncio->Work_days_end = $request->Work_days_end;
        $anuncio->Work_hour_begining = $request->Work_hour_begining;
        $anuncio->Work_hour_end = $request->Work_hour_end;
        $anuncio->Rate_anuncio = $request->Rate_anuncio;
        $anuncio->Whatsappnumber = $request->Whatsappnumber;
        $anuncio->Address1_anuncio = $request->Address1_model;
        $anuncio->Text_anuncio = $request->Text_anuncio;
        $anuncio->Price_service_anuncio = $request->Price_service_anuncio;
        $anuncio->Language_anuncio = $this->_languages;
        $anuncio->City_anuncio = $request->City_anuncio;
        $anuncio->Country_anuncio = $request->Country_anuncio;
        $anuncio->Places_work_anuncio = null;

        if (count($request->Places_work_anuncio)) {
            $anuncio->Places_work_anuncio = implode(', ', $request->Places_work_anuncio);
        }

        if ($request->hasfile('Video_anuncio')) {
            $this->_uploads_video($request, $anuncio, $modelo);
        } 

        return $anuncio;
    }



    /**
     * Display the specified resource.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function _uploads_img(Request $request, Anuncio $anuncio)
    {
        try {
            foreach ($request->file('Pictures_anuncio') as $key => $file) {

                $filename = 'pic_anuncio_'.$anuncio->id.'_'.$key.'.'.$file->getClientOriginalExtension();

                // save to public/assets/img/uploads/images/{anuncio_id} as the new $filename
                $path = $file->storeAs('uploads/images/'.$anuncio->id, $filename);

                $this->_picture = new Picture();
                $this->_picture->Path = $path;
                $this->_pictures[] = $this->_picture;
                
                unset($this->_picture);

            }
        } catch (\FileNotFoundException $e) {
            flash($e->getMessage())->error()->important();
            Log::error('An error occurred while storing the image.',['error'=>$e->getMessage()]);

        } catch (\Exception $e) {
            flash($e->getMessage())->error()->important();
            Log::error('An error occurred while storing the image.',['error'=>$e->getMessage()]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function _uploads_video(Request $request, Anuncio $anuncio, Modelo $modelo)
    {
        if ($request->file('Video_anuncio')->isValid()) {
            try {
                // cache the file
                $file = $request->file('Video_anuncio');

                // generate a new filename. getClientOriginalExtension() for the file extension
                $filename = 'vid_anuncio_'.time().'.'.$file->getClientOriginalExtension();

                // save to public/assets/img/uploads/video as the new $filename
                $path = $file->storeAs('uploads/videos/'.$modelo->id, $filename);

                $anuncio->Video_anuncio = $path;

            } catch (\FileNotFoundException $e) {
                Log::error('An error occurred while storing the image.',['error'=>$e->getMessage()]);

            } catch (\Exception $e) {
                Log::error('An error occurred while storing the image.',['error'=>$e->getMessage()]);
            }
        }
    }
}
