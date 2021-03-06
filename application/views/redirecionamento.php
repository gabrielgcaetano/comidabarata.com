<?php

foreach ($user as $user) {
    if ($user->user_tipo_user_id == 1) {
        $dados['nivel_usuario'] = "1";
        $this->session->set_userdata($dados);
        
        // Usuário Admin
        $this->db->select('*');
        $this->db->where('produto_status', "1");
        $this->db->where('produto_user_id', $this->session->userdata('user_id'));
        $dados['produto'] = $this->db->get('produto')->result();

        $this->load->view('inc/head-adm');
        $this->load->view('inc/menu_left_adm');
        $this->load->view('produtos/meusProdutosLista', $dados);
        $this->load->view('inc/footer-adm');
    } else if ($user->user_tipo_user_id == 2) {
        $dados['nivel_usuario'] = "2";
        $this->session->set_userdata($dados);
        
        // Usuário Normal
        redirect('main');
    } else {
        $dados['nivel_usuario'] = "3";
        $this->session->set_userdata($dados);
        
        // Usúario Empresa
        $this->db->select('*');
        $this->db->where('produto_status', "1");
        $this->db->where('produto_user_id', $this->session->userdata('user_id'));
        $dados['produto'] = $this->db->get('produto')->result();

        $this->load->view('inc/head-adm');
        $this->load->view('inc/menu_left');
        $this->load->view('produtos/meusProdutosLista', $dados);
        $this->load->view('inc/footer-adm');
    }
}
                                