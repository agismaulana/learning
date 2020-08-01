<?php 

function is_logged_in(){ 
    $ci = get_instance();
    if (!$ci->session->userdata('nisn')){
        redirect('auth/login');
    } else {
        $levelId = $ci->session->userdata('level_id');

        $userAccess = $ci->db->get_where('accessmenu',[
            'level_id'  => $levelId
        ]);

        if($userAccess->num_rows() < 1){
            redirect('auth/blocked');
        }
    }
}

function checkAccess($levelId, $menuId){
    $ci = get_instance();

    $result = $ci->db->get_where('accessmenu',[
        'level_id'  => $levelId,
        'menu_id'   => $menuId,    
    ]);

    if($result->num_rows() > 0){
        return 'checked';
    }
}


?>