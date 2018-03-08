<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YITH_WC_Points_Rewards_Customer_History_List_Table_Expanded
 *
 * @author Konstantin
 */
class YITH_WC_Points_Rewards_Customer_History_List_Table_Expanded  extends YITH_WC_Points_Rewards_Customer_History_List_Table {
    
    public function __construct( $args = array() ) {
        
        parent::__construct( array() );
    }    
    
    function get_columns() {       
        $coment = array('comment'      => __( 'Comment','yith-woocommerce-points-and-reward'));
        $columns = array_merge(parent::get_columns(),$coment) ;       
       // pa($columns);       

        return $columns;
    }
}
