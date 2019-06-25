<?php

class Crud_model extends CI_model {
    public function read()
    {
        return $this->db->get('praktikan')->result_array();
    }
    public function insert()
    {
        $data = [
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true))
        ];
    
        $this->db->insert('praktikan', $data);
    }
    public function insertAkun()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'foto' => 'default.jpg',
            'role_id' => 2
        ];

        $this->db->insert('user', $data);
    }
    public function update($id)
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'nim' => htmlspecialchars($this->input->post('nim', true))
        ];
        
        $this->db->where('id', $id);
        $this->db->update('praktikan', $data);
    }
    public function updateAkun($id)
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'nim' => htmlspecialchars($this->input->post('nim', true))
        ];
        
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    public function delete($id)
    {
        $this->db->delete('praktikan', array('id' => $id));
        $this->db->delete('user', array('id' => $id));
    }
    public function fetch($id)
    {
        return $this->db->get_where('praktikan', ['id' => $id])->row_array();
    }
}

?>