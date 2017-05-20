<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('inc/head-adm');
        $this->load->view('inc/menu_left');
        $this->load->view('adm/main');
        $this->load->view('inc/footer-adm');
    }

    public function login() {

        $this->load->view('inc/head-acesso');
        $this->load->view('acesso/login');
        $this->load->view('inc/footer-acesso');
    }

    public function login_entry() {

        // Pega os dados do Formulario de Login
        $user_email = $this->input->post('user_email');
        $user_senha = $this->input->post('user_senha');

        // Compara os dados no banco
        $this->db->where('user_email', $user_email);
        $this->db->where('user_senha', $user_senha);

        // Retorna o resultado
        $data['user'] = $this->db->get('user')->result();

        if (count($data['user']) == 1) {
            $dados['user_email'] = $data['user'][0]->user_email;
            $dados['user_id'] = $data['user'][0]->user_id;

            $this->session->set_userdata('user_id', $dados['user_id']);

            redirect('produto');
        } else {

            redirect('main?ErroSenha');
        }
    }

    /*
     * =============================================
     * =====    Inicio do Controller do USER   =====
     * =============================================    
     */

    public function register() {

        $this->load->view('inc/head-acesso');
        $this->load->view('acesso/register');
        $this->load->view('inc/footer-acesso');
    }

    public function register_save() {
        // recebe os dados do formulário
        $data['user_nome'] = $this->input->post('user_nome');
        $data['user_email'] = $this->input->post('user_email');
        $data['user_senha'] = $this->input->post('user_senha');


        if ($this->db->insert('user', $data)) {

            redirect(base_url('produto'));
        } else {
            redirect(base_url(''));
        }
    }

    public function UserUpdate($user_id = null) {
        $this->db->where('user_id', $_SESSION['user_id']);
        $data['user'] = $this->db->get('user')->result();

        $this->load->view('inc/head-adm');
        $this->load->view('inc/menu_left');
        $this->load->view('perfil/userUpdate', $data);
        $this->load->view('inc/footer-adm');
    }

    public function UserUpdateSalvar() {
        // recebe os dados do formulário
        $id = $this->input->post('user_id');

        $data['user_nome'] = $this->input->post('user_nome');
        $data['user_status'] = $this->input->post('user_status');

        $this->db->where('user_id', $id);
        if ($this->db->update('user', $data)) {

            $this->db->where('user_id', $_SESSION['user_id']);
            $data['user'] = $this->db->get('user')->result();

            $this->load->view('inc/head-adm');
            $this->load->view('inc/menu_left');
            $this->load->view('inc/modal');
            $this->load->view('modal/modalSalvoUpdate');
            $this->load->view('perfil/userUpdate', $data);
            $this->load->view('inc/footer-adm');

        } else {
            // Erro Cadastro
            $this->load->view('inc/head-adm');
            $this->load->view('inc/menu_left');
            $this->load->view('inc/modal');
            $this->load->view('modal/modalErroUpdate');
            $this->load->view('perfil/userUpdate', $data);
            $this->load->view('inc/footer-adm');
        }
    }

    /*
     * =============================================
     * ===== Inicio do Controller do TIPO USER =====
     * =============================================    
     */

    public function tipoUserLista() {
        $this->db->select('*');
        $this->db->where('user_tipo_status=1');
        $dados['user_tipo'] = $this->db->get('user_tipo')->result();
        $count = $this->db->count_all_results();


        if ($count > 0) {
            $this->load->view('inc/modal');
            $this->load->view('inc/head-adm');
            $this->load->view('inc/menu_left');
            $this->load->view('adm/tipoUserLista', $dados);
            $this->load->view('inc/footer-adm');
        } else {
            $this->load->view('inc/modal');
            $this->load->view('inc/head-adm');
            $this->load->view('inc/menu_left');
            $this->load->view('inc/modal');
            $this->load->view('modal/modalPesquisaZero');
            $this->load->view('adm/tipoUserLista', $dados);
            $this->load->view('inc/footer-adm');
        }
    }

    public function tipoUserAdd() {
        $this->load->view('inc/head-adm');
        $this->load->view('inc/menu_left');
        $this->load->view('adm/tipoUserAdd');
        $this->load->view('inc/footer-adm');
    }

    public function tipoUserSalvar() {
        // recebe os dados do formulário
        $data['user_tipo_nome'] = $this->input->post('user_tipo_nome');
        $data['user_tipo_status'] = 1;

        // Produto Salvo
        if ($this->db->insert('user_tipo', $data)) {

            $this->db->select('*');
            $this->db->where('user_tipo_status=1');
            $dados['user_tipo'] = $this->db->get('user_tipo')->result();

            $this->load->view('inc/head-adm');
            $this->load->view('inc/menu_left');
            $this->load->view('inc/modal');
            $this->load->view('modal/modalSalvoCadastro');
            $this->load->view('adm/tipoUserLista', $dados);
            $this->load->view('inc/footer-adm');

            // Erro Cadastro
        } else {
            $this->load->view('inc/head-adm');
            $this->load->view('inc/menu_left');
            $this->load->view('inc/modal');
            $this->load->view('modal/modalSalvoCadastro');
            $this->load->view('adm/tipoUserAdd');
            $this->load->view('inc/footer-adm');
        }
    }

    public function tipoUserPesquisa() {
        $nome = $this->input->post('user_tipo_nome');

        $this->db->select('*');
        $this->db->where('user_tipo_status=1');
        $this->db->like('user_tipo_nome', $nome);
        $dados['user_tipo'] = $this->db->get('user_tipo')->result();
        $count = count($dados['user_tipo']);

        // Verifica se resultou em Zero resultados
        if ($count > 0) {
            $this->load->view('inc/head-adm');
            $this->load->view('inc/menu_left');
            $this->load->view('adm/tipoUserLista.php', $dados);
            $this->load->view('inc/footer-adm');
        } else {
            $this->load->view('inc/modal');
            $this->load->view('inc/head-adm');
            $this->load->view('inc/menu_left');
            $this->load->view('inc/modal');
            $this->load->view('modal/modalPesquisaZero');
            $this->load->view('adm/tipoUserLista', $dados);
            $this->load->view('inc/footer-adm');
        }
    }

    public function tipoUserUpdate($user_tipo_id = null) {
        $this->db->where('user_tipo_id', $user_tipo_id);
        $data['user_tipo'] = $this->db->get('user_tipo')->result();

        $this->load->view('inc/head-adm');
        $this->load->view('inc/menu_left');
        $this->load->view('adm/tipoUserUpdate', $data);
        $this->load->view('inc/footer-adm');
    }

    public function tipoUserUpdateSalvar() {
        // recebe os dados do formulário
        $id = $this->input->post('user_tipo_id');

        $data['user_tipo_nome'] = $this->input->post('user_tipo_nome');
        $data['user_tipo_status'] = $this->input->post('user_tipo_status');

        $this->db->where('user_tipo_id', $id);
        if ($this->db->update('user_tipo', $data)) {
            // Produto Salvo
            $this->db->select('*');
            $this->db->where('user_tipo_status=1');
            $dados['user_tipo'] = $this->db->get('user_tipo')->result();

            $this->load->view('inc/head-adm');
            $this->load->view('inc/menu_left');
            $this->load->view('inc/modal');
            $this->load->view('modal/modalSalvoUpdate');
            $this->load->view('adm/tipoUserLista', $dados);
            $this->load->view('inc/footer-adm');
        } else {
            // Erro Cadastro
            $this->load->view('inc/head-adm');
            $this->load->view('inc/menu_left');
            $this->load->view('inc/modal');
            $this->load->view('modal/modalErroUpdate');
            $this->load->view('adm/tipoUserAdd');
            $this->load->view('inc/footer-adm');
        }
    }

}
