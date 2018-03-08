<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of yith_wc_points_rewards_expanded
 *
 * @author Konstantin
 */
class YITH_WC_Points_Rewards_Expanded extends YITH_WC_Points_Rewards {


    public function register_log_com($user_id, $action, $order_id, $amount, $comment, $data_earning = false, $expired = false) {
        global $wpdb;
        $date = apply_filters('ywpar_points_registration_date', date_i18n("Y-m-d H:i:s"));
        $table_name = $wpdb->prefix . 'yith_ywpar_points_log';
        $args = array(
            'user_id' => $user_id,
            'action' => $action,
            'order_id' => $order_id,
            'comment' => $comment,
            'amount' => $amount,
            'date_earning' => ( $data_earning ) ? $data_earning : $date
        );

        if ($expired) {
            $args['cancelled'] = $date;
        }
        //pa($date,1);
        $wpdb->insert($table_name, $args);
    }

}
