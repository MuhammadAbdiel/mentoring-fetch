<?php

class CategoryModel extends CI_Model
{
  protected $table = 'categories';
  protected $primary = 'id';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll()
  {
    return  $this->db->get($this->table)->result();
  }

  public function find($id)
  {
    return $this->db->get_where($this->table, [$this->primary => $id])->row();
  }

  public function create($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function update($id, $data)
  {
    return $this->db->update($this->table, $data, [$this->primary => $id]);
  }

  public function delete($id)
  {
    return $this->db->delete($this->table, [$this->primary => $id]);
  }
}
