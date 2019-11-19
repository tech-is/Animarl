<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * タイトル：顧客・ペット管理
 * 説明    ：顧客・ペットの登録・変更・削除を行う
 *
 * 著作権  ：Copyright(c) 2019 TECH I.S
 * 会社名  ：TECH I.S
 *
 * 変更履歴：2019.8 開発
 */

class Mdl_karute extends CI_Model {

    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->database();
    }

    //kauteの診断内容のを削除
    public function delete_karute_data($id)
    {
        $this->db->set("kareute", 999);
        $this->db->where(['karute_id'=> $id['karute_id'], 'karute_shop_id ' => $id["shop_id"]]);
        return $this->db->update('kakrute');
    }

    //取得(Cl_karuteもしよう)
    public function m_karute_get($shop_id,$customer_id)
    {
        // echo $customer_id;
        // exit;
        $where = ['customer_state ' => 1, 'pet_state ' => 1, 'customer_shop_id'=>$shop_id, 'customer_id'=>$customer_id];
        $this->db->where($where);
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->join('pet', 'customer_id = pet_customer_id', 'left');
        $this->db->join('kind_group', 'customer_id = kind_group_shop_id', 'left');
        $this->db->join('reserve', 'customer_id = reserve_customer_id', 'left');
        $this->db->join('staff', 'customer_id = staff_shop_id', 'left');
        $query = $this->db->get();
        // SQL文を教えてくれる
        // echo $this->db->last_query();
        // exit;
        return $query->row_array(); //結果を配列で返す。
    }
     //カルテ画面表示分カスタマーのセレクトの分をとってくる
    public function get_karute_for_customers($shop_id)
    {
        $where = ['customer_state ' => 1,'karute_state ' => 1, 'karute_shop_id '=> $shop_id];
        $this->db->where($where);
        $this->db->select("karute_id, karute_title, karute_comment , karute_created_at , karute_update_at, customer_name , customer_tel , customer_mail ");
        $this->db->from('karute');
        $this->db->join('customer', 'customer_id = karute_customer_id', 'left');
        $this->db->join('shops', 'shop_id = karute_shop_id', 'left');
        $query = $this->db->get();
        //  echo $this->db->last_query();
         return $query->result_array(); //結果を配列で返す。
    }

    public function get_karute_for_customer($shop_id)
    {
        $where = ['karute_state ' => 1, 'karute_shop_id '=> $shop_id];
        $this->db->where($where);
        $this->db->select("karute_created_at, karute_customer_id");
        $this->db->from('karute');
        $query = $this->db->get();
        //  echo $this->db->last_query();
         return $query->row_array(); //結果を配列で返す。
    }

    //待ち受けカルテをここで仮登録登録
    public function sub_insert_karute($karute_shop_id, $karute_customer_id)
    {
        $data = [
            'karute_shop_id' => $karute_shop_id,
            'karute_customer_id' => $karute_customer_id
        ];
        return $this->db->insert('karute', $data);
        // $this->db->last_query();
        // exit;
    }

    //待ち受けカルテからここで本登録登録
    public function main_insert_karute($data)
    {
        $data = [
            'karute_customer_id' => $karute_customer_id,
            'karute_shop_id' => $karute_created_at,
            'karute_title' => $karute_title,
            'karute_comment' => $karute_comment
        ];
        return $this->db->replace('karute', $data);
        // $this->db->last_query();
        // exit;
    }

    //更新処理
    // public function m_update_total_list($id, $customer_data, $pet_data)
    // {
    //     $this->db->trans_start();
    //     $this->db->set($customer_data);
    //     $this->db->where(['customer_id'=> $id['customer_id']]);
    //     $this->db->update('customer');
    //     $this->db->set($pet_data);
    //     $this->db->where(['pet_id'=> $id['pet_id']]);
    //     $this->db->update('pet');
    //     $this->db->trans_complete();
    //     if ($this->db->trans_status() === FALSE) {
    //     $this->db->trans_rollback();
    //         return false;
    //     } else {
    //     $this->db->trans_commit();
    //         return true;
    //     }
    // }
}