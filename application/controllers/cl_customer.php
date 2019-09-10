<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cl_customer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(["url", "form"]);
        $this->load->library('session');
        // session_start();
        $_SESSION["shops_id"] = 1;
    }
   
    public function index()
    {
        //mdl_customerの呼び出し
        $this->load->model('mdl_customer');

        //顧客登録一覧
        $this->load->view('cms/pages/parts/header');
        $this->load->view('cms/pages/parts/sidebars');
        $this->load->view('cms/Customer_view');
    }

    public function custmoer_form()
    {
        $this->load->view('cms/pages/parts/header');
        $this->load->view('cms/pages/parts/sidebars');
        $this->load->view('cms/Customer_view');
    }

    public function custmoer_list()
    {
        $this->load->view('cms/pages/parts/header');
        $this->load->view('cms/pages/parts/sidebars');
        $this->load->view('cms/vi_total_list.php');
    }

    //入力後のミス確認からモデルへ
    public function customer_validation(){
        $c_test['customer_magazine'] ="";
        $config=array(
            array(
                'field' => 'customer_name',
                'label' => '名前',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => '名前を入力してください'
                )
            ),
            array(
                'field' => 'customer_kana',
                'label' => 'カナ',
                'rules' => 'required|trim',
                'errors' => array(
                'required' => 'カナを入力してください'
                                                    )
                ),
            array(
                'field' => 'customer_mail',
                'label' => 'メール',
                'rules' => 'required',
                'errors' => array(
                'required' => 'メールを入力して下さい'
                                                        )
                ),
            array(
                'field' => 'customer_tel',
                'label' => '電話',
                'rules' => 'required|trim',
                'errors' => array(
                'required' => '番号を入力してください'
                                                        )
                ),
            array(
                'field' => 'customer_zip_address',
                'label' => '郵便番号',
                'rules' => 'required|trim',
                'errors' => array(
                'required' => '郵便番号を入力してください'
                                                        )
                ),
            array(
                'field' => 'customer_address',
                'label' => '住所',
                'rules' => 'required|trim',
                'errors' => array(
                'required' => '住所を入力してください'
                                                        )
                ),
            array(
                'field' => 'customer_magazine',
                'label' => 'マガジン発行',
                ),
            array(
                'field' => 'customer_add_info',
                'label' => '追加情報',
                'rules' => 'required|trim',
                ),
            array(
                'field' => 'customer_group',
                'label' => 'ランク',
                'rules' => 'required|trim',
                )
        );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);
    if ($this->form_validation->run() !== false){
                $this->load->model('mdl_customer');
                $c_test = $this->input->post(NULL,true);
        }else{
            $this->load->view('cms/Customer_view.html');
        }

                //メールマガジンをintへ
                if(isset($c_test['customer_magazine'])){
                    if($c_test['customer_magazine'] == 'null') {
                            $c_test['customer_magazine'] = 0;
                        }else{
                            $c_test['customer_magazine'] = 1;
                    }
                }
                //グループをintへ
                    if($c_test['customer_group'] == 'gold') {
                            $c_test['customer_group'] = 0;
                        }elseif ($c_test['customer_group'] == 'silver') {
                            $c_test['customer_group'] = 1;
                        }elseif($c_test['customer_group'] == 'bronze'){
                            $c_test['customer_group'] = 2;
                        }else{
                            $c_test['customer_group'] = 3;
                        }

                        
                    $this->session;
                    $c_test["customer_shop_id"] = $_SESSION["shops_id"];
                    $this->load->model("mdl_customer");
                    
                
                    //データベースの呼び出し
                if($this->mdl_customer->m_insert_customer($c_test) == true) {
                        redirect('http://localhost/sub/cl_total_list/?flg=2');
                      
                    } else {
                    
                        $data['comment'] = "※登録に失敗しました。再度ご入力をお願いします。";
                        $this->load->view('cms/pages/parts/header');
                        $this->load->view('cms/pages/parts/sidebars');
                        $this->load->view('cms/pet_info_view',$data);
                    }
                }
}
