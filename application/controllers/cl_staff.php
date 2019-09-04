<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cl_staff extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(["url", "form"]);
    }

    public function register_staff()
    {
        if($this->check_staff_data() == true) {
            if($this->insert_staff() == true) {
                // redirect("cl_main/reserve");
                echo "success!";
            } else {
                // redirect("cl_main/reserve");
                echo "false…";
            }
        } else {
            echo "hoge";
        }
    }

    /**
     * check_user
     * 
     * @param $_POST["email"] = ポストされたメールアドレス
     * @return メインページにリダイレクト
     */
    public function check_staff_data()
    {
        $config = [
            [
                'field' => 'staff_name',
                'label' => 'メールアドレス',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'staff_color',
                'label' => 'パスワード',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'staff_remarks',
                'label' => '備考',
                'rules' => 'trim'
            ]
        ];
        $this->load->library("form_validation", $config);
        return $this->form_validation->run();
    }

    public function insert_staff()
    {
        $data = [
            // "staff_shop_id" => $_SESSION["shop_id"],
            "staff_shop_id" => 1,
            "staff_name" => $this->input->post("staff_name"),
            "staff_color" => $this->input->post("staff_color"),
            "staff_remarks" => $this->input->post("staff_remarks")
        ];
        $this->load->model("mdl_staff");
        return $this->mdl_staff->insert_staff_data($data);
    }

    public function update_staff()
    {
        $data = [
            // "staff_shop_id" => $_SESSION["shop_id"],
            "staff_shop_id" => 1,
            "staff_name" => $this->input->post("staff_name"),
            "staff_color" => $this->input->post("staff_color"),
            "staff_detail" => $this->input->post("staff_detail")
        ];
        $this->load->model("mdl_staff");
        return $this->mdl_staff->update_staff($data);
    }

    public function delete_staff()
    {
        //
    }

    public function insert_shift()
    {
        //
    }

    public function update_shift()
    {
        //
    }

    public function delete_shift()
    {

    }

}