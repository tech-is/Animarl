<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
 * タイトル：顧客・ペット管理
 * 説明    ：顧客・ペットの登録・変更・削除を行う
 *
 * 著作権  ：Copyright(c) 2019 TECH I.S
 * 会社名  ：TECH I.S
 *
 * 変更履歴：2019.8 開発
 */

class Mdl_total_list extends CI_Model
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->database();
    }

    //kind_groupをインサート
    public function insert_group($data)
    {
        $this->db->insert('kind_group', $data)? $result = true: $result = false;
        return $result;
    }
    //kind_groupを削除
    public function delete_kind_group($id)
    {
        $this->db->set('kind_group_state', 999);
        $this->db->where(['kind_group_id'=> $id['kind_group_id'], 'kind_group_shop_id ' => $id['shop_id']]);
        return $this->db->update('kind_group');
    }

    //グループの登録の中身を取得
    public function m_get_kind_group($where)
    {
        return $this->db->where($where)->select('kind_group_id, kind_group_name')->from('kind_group')->get()->result_array();
    }

    //更新の中身を取得
    public function m_get_total_all($pet_id)
    {
        $where = ['customer_state ' => 1, 'pet_state ' => 1, 'pet_id '=> $pet_id];
        $query = $this->db->where($where)->select('*')->from('customer')->join('pet', 'customer_id = pet_customer_id', 'left')->get();
        return $query->row_array(); //結果を配列で返す。
    }

    //トータルリスト画面表示分カスタマーのセレクトの分をとってくる
    public function get_total_data($shop_id)
    {
        $where = ['customer_state ' => 1, 'customer_shop_id '=> $shop_id];
        $this->db->where($where);
        $this->db->select('pet_id , customer_name , pet_name , customer_tel , customer_mail , kind_group_name');
        $this->db->from('customer');
        $this->db->join('pet', 'customer_id = pet_customer_id', 'left');
        $this->db->join('kind_group', 'customer_group_id = kind_group_id', 'left');
        $query = $this->db->get();
        return $query->result_array(); //結果を配列で返す。
    }

    /**
     * customerテーブルとpetテーブルに対してINSERTクエリを実行
     *
     * @param array $customer_data
     * @param array $pet_data
     * @return void
     */
    public function insert_total($customer_data, $pet_data)
    {
        $this->db->trans_start();
        $this->db->insert('customer', $customer_data);
        $pet_data['pet_customer_id'] = $this->db->insert_id();
        $this->db->insert('pet', $pet_data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    /**
     * customerテーブルとpetテーブルに対してUPDATEクエリを実行
     *
     * @param string $id
     * @param array $customer_data
     * @param array $pet_data
     * @return bool
     */
    public function update_total($id, $customer_data, $pet_data)
    {
        $this->db->trans_start();
        $this->db->set($customer_data)->where(['customer_id'=> $id['customer_id']])->update('customer');
        $this->db->set($pet_data)->where(['pet_id'=> $id['pet_id']])->update('pet');
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    //履歴画面表示分カスタマーのセレクトの分をとってくる
    public function get_karute_for_customer($shop_id)
    {
        $where = ['customer_state ' => 1, 'customer_shop_id '=> $shop_id];
        $this->db->where($where);
        $this->db->select('customer_id, pet_id , customer_name , pet_name , customer_tel , customer_mail , kind_group_name');
        $this->db->from('customer');
        $this->db->join('pet', 'customer_id = pet_customer_id', 'left');
        $this->db->join('kind_group', 'customer_group_id = kind_group_id', 'left');
        $query = $this->db->get();
        return $query->result_array(); //結果を配列で返す。
    }
}
