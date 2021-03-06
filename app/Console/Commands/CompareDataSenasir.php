<?php

namespace Muserpol\Console\Commands;

use Illuminate\Console\Command;

use Muserpol\EconomicComplementApplicant;
use Muserpol\EconomicComplement;
use Muserpol\Affiliate;
use Maatwebsite\Excel\Facades\Excel;
use Muserpol\Helper\Util;
use Carbon\Carbon;
use Log;
use stdClass;

class CompareDataSenasir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compare:senasir';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        global $Progress, $aficount,$afincount, $d_ch_count, $d_n_ch_count,$c_ch_count, $c_n_ch_count, $nt, $degree, $category, $data ,$data_may ,$afi,$data_ders,$data_tits,$tit_distint;
        $password = $this->ask('Enter the password');
        if ($password == ACCESS) {
            $FolderName = $this->ask('Enter the name of the folder you want to import');

            if ($this->confirm('Are you sure to import the folder "' . $FolderName . '" ? [y|N]') && $FolderName) {
                $time_start = microtime(true);
                $this->info("Working...\n");
                $Progress = $this->output->createProgressBar();
                $Progress->setFormat("%current%/%max% [%bar%] %percent:3s%%");
                Excel::batch('public/file_to_import/' . $FolderName . '/', function($rows, $file) {
                    $rows->each(function($result) {
                        global $Progress,$aficount, $afincount, $d_ch_count, $d_n_ch_count,$c_ch_count, $c_n_ch_count, $nt, $degree, $category,$data,$data_may,$afi,$data_ders,$data_tits,$tit_distint;
                        ini_set('memory_limit', '-1');
                        ini_set('max_execution_time', '-1');
                        ini_set('max_input_time', '-1');
                        set_time_limit('-1');
                        $ci = trim(Util::removeSpaces(trim($result->carnet)).((trim(Util::removeSpaces($result->num_com)) !='') ? '-'.$result->num_com: ''));
                        if ($result->renta == 'TITULAR') {
                            $afi=Affiliate::whereRaw("split_part(ltrim(trim(identity_card),'0'), '-',1) ='".explode('-',ltrim(trim($ci),'0'))[0]."'")->first();
                            if ($afi) {
                                $aficount++;
                                # code...
                                $eco=EconomicComplement::where('affiliate_id','=', $afi->id)->where('eco_com_procedure_id','=',6)->first();
                                if ($eco) {
                                    $app=$eco->economic_complement_applicant;
                                    if (
                                        Util::removeSpaces($app->last_name) != Util::removeSpaces($result->paterno) ||
                                        Util::removeSpaces($app->mothers_last_name) != Util::removeSpaces($result->materno) ||
                                        Util::removeSpaces($app->first_name) != Util::removeSpaces($result->p_nombre) ||
                                        Util::removeSpaces($app->second_name) != Util::removeSpaces($result->s_nombre) ||
                                        $app->birth_date != Carbon::parse($result->fecha_nacimiento)->toDateString()
                                     ) {
                                        $tit_distint++;
                                        $data_tits[]=array(
                                        'ci' => $app->identity_card,
                                        'ext' => $app->city_identity_card->first_shortened ?? '',
                                        'primer_nombre' => $app->first_name,
                                        'senasir_primer_nombre' => $result->p_nombre,
                                        'segundo_nombre' => $app->second_name,
                                        'senasir_segundo_nombre' => $result->s_nombre,
                                        'paterno' => $app->last_name,
                                        'senasir_paterno' => $result->paterno,
                                        'materno' => $app->mothers_last_name,
                                        'senasir_materno' => $result->materno,
                                        'fecha_nac' => $app->birth_date,
                                        'senasir_fecha_nac' => $result->fecha_nacimiento ? Carbon::parse($result->fecha_nacimiento)->toDateString() : '',
                                        'code' => $eco->code,
                                        'id' => $eco->id,
                                        );  
                                        // $data_tits[] = $data_tit;
                                    }
                                }
                            }else{
                                $this->info($ci);
                                $afincount++;
                            }
                        }else if($result->renta == 'DERECHOHABIENTE'){
                            $app=EconomicComplementApplicant::whereRaw("split_part(ltrim(trim(identity_card),'0'), '-',1) ='".explode('-',ltrim(trim($ci),'0'))[0]."'")->first();
                            if ($app) {
                                $aficount++;
                                $eco = $app->economic_complement->affiliate->economic_complements()->where('eco_com_procedure_id','=',6)->first();
                                if ($eco) {
                                    $app=$eco->economic_complement_applicant;
                                    if (
                                        Util::removeSpaces($app->last_name) != Util::removeSpaces($result->paterno) ||
                                        Util::removeSpaces($app->mothers_last_name) != Util::removeSpaces($result->materno) ||
                                        Util::removeSpaces($app->first_name) != Util::removeSpaces($result->p_nombre) ||
                                        Util::removeSpaces($app->second_name) != Util::removeSpaces($result->s_nombre) ||
                                        $app->birth_date != Carbon::parse($result->fecha_nacimiento)->toDateString()
                                     ) {
                                        $tit_distint++;
                                        
                                        $data_ders[] = array(
                                            'ci' => $app->identity_card,
                                            'ext' => $app->city_identity_card->first_shortened ?? '',
                                            'primer_nombre' => $app->first_name,
                                            'senasir_primer_nombre' => $result->p_nombre,
                                            'segundo_nombre' => $app->second_name,
                                            'senasir_segundo_nombre' => $result->s_nombre,
                                            'paterno' => $app->last_name,
                                            'senasir_paterno' => $result->paterno,
                                            'materno' => $app->mothers_last_name,
                                            'senasir_materno' => $result->materno,
                                            'fecha_nac' => $app->birth_date,
                                            'senasir_fecha_nac' => $result->fecha_nacimiento ?  Carbon::parse($result->fecha_nacimiento)->toDateString() : '',
                                            'code' => $eco->code,
                                            'id' => $eco->id,
                                        );
                                        
                                    }
                                }
                            }else{
                                $afincount++;
                                $this->info($ci);
                            }

                        }
                        
                        $Progress->advance();
                        });
                });
                    Excel::create('Lista Afiliados que varian los datos personales con senasir'.date("Y-m-d H:i:s"),function($excel)
                    {
                        global $data_tits,$data_ders;
                        $excel->sheet('titulares',function($sheet) use($data_tits){
                            global $data_tits;
                            $sheet->fromArray($data_tits);
                        });
                        $excel->sheet('derechohabientes',function($sheet) use($data_ders){
                            global $data_ders;
                            $sheet->fromArray($data_ders);
                        });
                    })->store('xls', storage_path('excel/exports'));
                $time_end = microtime(true);
                $execution_time = ($time_end - $time_start)/60;
                $Progress->finish();
                $this->info("\n\nFound $aficount Affiliates\n
                    Not Found $afincount affiliates\n
                    Afiliaados con datos distintos $tit_distint \n
                    Execution time $execution_time [minutes].\n");
            }
        }else {
            $this->error('Incorrect password!');
            exit();
        }
    }
}
