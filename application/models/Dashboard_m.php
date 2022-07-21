<?php

class Dashboard_m extends CI_Model {   

function activenverified(){
    $this->db->select('count(id) as total');
    $this->db->from('users');
    $this->db->where('active',1);
    $this->db->where('verified',1);
    return $this->db->get()->row()->total;
    }	
    
function activewithproducts(){
    $this->db->select('count(up.id) as total');
    $this->db->from('users_products as up');
    $this->db->join('users as u','u.id=up.id_user');
    $this->db->join('products as p','p.id=up.id_product');
    $this->db->where('u.active',1);
    $this->db->where('u.verified',1);
    $this->db->where('p.status',1);
    return $this->db->get()->row()->total;
    }	

function activeproducts(){
    $this->db->select('count(id) as total');
    $this->db->from('products');
    $this->db->where('status',1);
    return $this->db->get()->row()->total;
        }	
        
function activeproductswithoutuser(){
    $this->db->select('count(id) as total');
    $this->db->from('products');
    $this->db->where('status',1);
    $this->db->where('id not in (select id_product from users_products)');
    return $this->db->get()->row()->total;
        }	
         
function amountactiveproducts(){
    $this->db->select('sum(up.qty) as total');
    $this->db->from('users_products as up');
    //$this->db->join('users as u','u.id=up.id_user');
    $this->db->join('products as p','p.id=up.id_product');
    //$this->db->where('u.active',1);
    //$this->db->where('u.verified',1);
    $this->db->where('p.status',1);
    return $this->db->get()->row()->total;
}	
         
function summarizedprice(){
    $this->db->select('sum(up.qty * up.price) as total');
    $this->db->from('users_products as up');
    //$this->db->join('users as u','u.id=up.id_user');
    $this->db->join('products as p','p.id=up.id_product');
    //$this->db->where('u.active',1);
    //$this->db->where('u.verified',1);
    $this->db->where('p.status',1);
    return $this->db->get()->row()->total;
}

function productsperuser(){
    $this->db->select('u.name,sum(up.qty * up.price) as price_all');
    $this->db->from('users_products as up');
    $this->db->join('users as u','u.id=up.id_user');
    $this->db->join('products as p','p.id=up.id_product');
    //$this->db->where('u.active',1);
    //$this->db->where('u.verified',1);
    $this->db->where('p.status',1);
    $this->db->group_by('u.id');
    return $this->db->get();
}

}
