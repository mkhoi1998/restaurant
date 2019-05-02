<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Site_model');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->helper('cookie');
    $this->load->helper('form');
    $this->load->library('cart');
  }
  public function valid()
  {
    $dat = $this->Site_model->user([$this->input->post('email'),$this->input->post('password')]);
    if ($dat)
    {
      $this->input->set_cookie('user',$this->input->post('email'),60);
      $this->session->set_userdata('userInfo', ['user'=>TRUE]);
      echo $dat;
    }
  }
  public function account_logout()
  {
    $this->session->unset_userdata('userInfo');
    header("Refresh:0 url='home.html'");
  }
  public function index()
  {
    header("Refresh:0 url='home.html'");
  }
  public function home()
  {
    if ($this->input->post('email'))
    {
      $dat = $this->Site_model->user([$this->input->post('email'),$this->input->post('password')]);
      if ($dat)
      {
        $this->input->set_cookie('user',$this->input->post('email'),60);
        $this->session->set_userdata('userInfo', ['user'=>TRUE]);
        $sql = $this->Site_model->home();
        $data["url"] = "home.html";
        $data["title"] = "Home";
        $data["tit"] = $sql[0];
        $data["contain"] = $sql[1];
        $data["logon"] = TRUE;
        $this->load->view('app/home',$data);
      }
      else $this->load->view('app/home');
    }
    else if(!$this->session->userdata('userInfo'))
    {
      $sql = $this->Site_model->home();
      $data["url"] = "home.html";
      $data["title"] = "Home";
      $data["tit"] = $sql[0];
      $data["contain"] = $sql[1];
      $data["logon"] = FALSE;
      $this->load->view('app/home',$data);
    }
    else if (!$this->input->cookie('user'))
    {
      $sql = $this->Site_model->home();
      $data["url"] = "home.html";
      $data["title"] = "Home";
      $data["tit"] = $sql[0];
      $data["contain"] = $sql[1];
      $data["logon"] = FALSE;
      $this->load->view('app/home',$data);
    }
    else
    {
      $this->input->set_cookie('user',get_cookie('user'),60);
      $sql = $this->Site_model->home();
      $data["url"] = "home.html";
      $data["title"] = "Home";
      $data["tit"] = $sql[0];
      $data["contain"] = $sql[1];
      $data["logon"] = TRUE;
      $this->load->view('app/home',$data);
    }
  }
  public function restaurant()
  {  
    if ($this->input->post('email'))
    {
      $dat = $this->Site_model->user([$this->input->post('email'),$this->input->post('password')]);
      if ($dat)
      {
        $this->input->set_cookie('user',$this->input->post('email'),60);
        $this->session->set_userdata('userInfo', ['user'=>TRUE]);
        $sql1 = $this->Site_model->restaurant();
        $sql2 = $this->Site_model->imgRestaurant();
        $data["url"] = "restaurant.html";
        $data["title"] = "Home";
        $data["contain"] = $sql1;
        $data["img"] = $sql2;
        $data["logon"] = TRUE;
        $this->load->view('app/restaurant',$data);
      }
      else $this->load->view('app/restaurant');
    }
    else if(!$this->session->userdata('userInfo'))
    {
      $sql1 = $this->Site_model->restaurant();
      $sql2 = $this->Site_model->imgRestaurant();
      $data["url"] = "restaurant.html";
      $data["title"] = "Home";
      $data["contain"] = $sql1;
      $data["img"] = $sql2;
      $data["logon"] = FALSE;
      $this->load->view('app/restaurant',$data);
    }
    else if (!$this->input->cookie('user'))
    {
      $sql1 = $this->Site_model->restaurant();
      $sql2 = $this->Site_model->imgRestaurant();
      $data["url"] = "restaurant.html";
      $data["title"] = "Home";
      $data["contain"] = $sql1;
      $data["img"] = $sql2;
      $data["logon"] = FALSE;
      $this->load->view('app/restaurant',$data);
    }
    else
    {
      $this->input->set_cookie('user',get_cookie('user'),60);
      $sql1 = $this->Site_model->restaurant();
      $sql2 = $this->Site_model->imgRestaurant();
      $data["url"] = "restaurant.html";
      $data["title"] = "Home";
      $data["contain"] = $sql1;
      $data["img"] = $sql2;
      $data["logon"] = TRUE;
      $this->load->view('app/restaurant',$data);
    }
  }
  public function menu()
  { 
    if ($this->input->post('email'))
    {
      $dat = $this->Site_model->user([$this->input->post('email'),$this->input->post('password')]);
      if ($dat)
      {
        if($this->input->get('type'))
          $sql = $this->Site_model->menuLimit($this->input->get('type'));
        else
          $sql = $this->Site_model->menu();
        $this->input->set_cookie('user',$this->input->post('email'),60);
        $this->session->set_userdata('userInfo', ['user'=>TRUE]);
        $data["url"] = "menu.html";
        $data["title"] = "Menu";
        $data["contain"] = $sql;
        $data["logon"] = TRUE;
        $this->load->view('app/menu',$data);
      }
      else $this->load->view('app/menu');
    }
    else if(!$this->session->userdata('userInfo'))
    {
      if($this->input->get('type'))
        $sql = $this->Site_model->menuLimit($this->input->get('type'));
      else
        $sql = $this->Site_model->menu();
      $data["url"] = "menu.html";
      $data["title"] = "Menu";
      $data["contain"] = $sql;
      $data["logon"] = FALSE;
      $this->load->view('app/menu',$data);
    }
    else if (!$this->input->cookie('user'))
    {
      if($this->input->get('type'))
        $sql = $this->Site_model->menuLimit($this->input->get('type'));
      else
        $sql = $this->Site_model->menu();
      $data["url"] = "menu.html";
      $data["title"] = "Menu";
      $data["contain"] = $sql;
      $data["logon"] = FALSE;
      $this->load->view('app/menu',$data);
    }
    else
    {
      if($this->input->get('type'))
        $sql = $this->Site_model->menuLimit($this->input->get('type'));
      else
        $sql = $this->Site_model->menu();
      $this->input->set_cookie('user',get_cookie('user'),60);
      $data["url"] = "menu.html";
      $data["title"] = "Menu";
      $data["contain"] = $sql;
      $data["logon"] = TRUE;
      $this->load->view('app/menu',$data);
    }
  }
  public function order()
  {
    $data=array(
    "id" => $this->input->post('hid'),
    "name" => $this->input->post('hname'),
    "qty" => $this->input->post('hnumber'),
    "price" =>$this->input->post('hcash'),
    );
    if($this->cart->insert($data))
      echo True;
  }
  function clear()
  {
    $this->cart->destroy();
    header("Refresh:0 url='menu.html");
  }
  function update()
  {
    if(!$this->session->userdata('userInfo'))
    {
      $sql = $this->Site_model->menu();
      $data["url"] = "menu.html";
      $data["title"] = "Menu";
      $data["contain"] = $sql;
      $data["logon"] = FALSE;
      $this->load->view('app/menu',$data);
    }
    else if (!$this->input->cookie('user'))
    {
      $sql = $this->Site_model->menu();
      $data["url"] = "menu.html";
      $data["title"] = "Menu";
      $data["contain"] = $sql;
      $data["logon"] = FALSE;
      $this->load->view('app/menu',$data);
    }
    else
    {
    $cart_info = $_POST['cart'] ;
    foreach( $cart_info as $id => $cart)
    {
      $rowid = $cart['rowid'];
      $price = $cart['price'];
      $amount = $price * $cart['qty'];
      $qty = $cart['qty'];
                    
      $data = array(
      'rowid' => $rowid,
      'price' => $price,
      'amount' => $amount,
      'qty' => $qty
      );       
      $this->cart->update($data);
      header("Refresh:0 url='menu.html");
    }
  }
  }
  public function remove()
  {
    if(!$this->session->userdata('userInfo'))
    {
      $sql = $this->Site_model->menu();
      $data["url"] = "menu.html";
      $data["title"] = "Menu";
      $data["contain"] = $sql;
      $data["logon"] = FALSE;
      $this->load->view('app/menu',$data);
    }
    else if (!$this->input->cookie('user'))
    {
      $sql = $this->Site_model->menu();
      $data["url"] = "menu.html";
      $data["title"] = "Menu";
      $data["contain"] = $sql;
      $data["logon"] = FALSE;
      $this->load->view('app/menu',$data);
    }
    else
    {
    $id = $this->input->get('id');
    $data = array(
      'rowid' => $id,
      'qty' => 0
    );
    $this->cart->update($data);
    header("Refresh:0 url='menu.html");
    }
  }
  public function order_del()
  {
    $oid = $this->input->get('oid');
    $pid = $this->input->get('pid');
    $this->Site_model->orderDel([$oid, $pid]);
    header("Refresh:0 url='account.html");
  }
  public function purchase()
  {
    $order = array(
      'UEMAIL' => get_cookie('user'),
      'ODATE' => date('Y-m-d')
    );
    $ord_id = $this->Site_model->order($order);
    if ($cart = $this->cart->contents())
    {
      foreach ($cart as $item)
      {
        $order_detail = array(
          'OID' => $ord_id,
          'PID' => $item['name'],
          'PQUANTITY' => $item['qty'],
          'PPRICE' => $item['price']
        );  
        $cust_id = $this->Site_model->orderDetail($order_detail);
      }
      $this->cart->destroy(); 
      $this->input->set_cookie('output',"Order placed.",1);
      header("Refresh:0 url='menu.html");
    }
  }
  public function contact()
  {
    if ($this->input->post('email'))
    {
      $dat = $this->Site_model->user([$this->input->post('email'),$this->input->post('password')]);
      if ($dat)
      {
        $this->input->set_cookie('user',$this->input->post('email'),60);
        $this->session->set_userdata('userInfo', ['user'=>TRUE]);
        $sql = $this->Site_model->contact();
        $data["url"] = "contact.html";
        $data["title"] = "Contact";
        $data["contain"] = $sql;
        $data["logon"] = TRUE;
        $this->load->view('app/contact',$data);
      }
      else $this->load->view('app/contact');
    }
    else if(!$this->session->userdata('userInfo'))
    {
      $sql = $this->Site_model->contact();
      $data["url"] = "contact.html";
      $data["title"] = "Contact";
      $data["contain"] = $sql;
      $data["logon"] = FALSE;
      $this->load->view('app/contact',$data);
    }
    else if (!$this->input->cookie('user'))
    {
      $sql = $this->Site_model->contact();
      $data["url"] = "contact.html";
      $data["title"] = "Contact";
      $data["contain"] = $sql;
      $data["logon"] = FALSE;
      $this->load->view('app/contact',$data);
    }
    else
    {
      $this->input->set_cookie('user',get_cookie('user'),60);
      $sql = $this->Site_model->contact();
      $data["url"] = "contact.html";
      $data["title"] = "Contact";
      $data["contain"] = $sql;
      $data["logon"] = TRUE;
      $this->load->view('app/contact',$data);
    }
  }
  public function feedback()
  {
    if ($this->input->post('email'))
    {
      $dat = $this->Site_model->user([$this->input->post('email'),$this->input->post('password')]);
      if ($dat)
      {
        $this->input->set_cookie('user',$this->input->post('email'),60);
        $this->session->set_userdata('userInfo', ['user'=>TRUE]);
        header("Refresh:0 url='contact.html");
      }
      else header("Refresh:0 url='contact.html");
    }
    else if(!$this->session->userdata('userInfo'))
    {
      header("Refresh:0 url='contact.html");
    }
    else if (!$this->input->cookie('user'))
    {
      header("Refresh:0 url='contact.html");
    }
    else
    {
      if (get_cookie('subject')=='' && get_cookie('message') == '')
      {
        $this->input->set_cookie('output',"", 1);
        header("Refresh:0 url=contact.html");
      }
      else if (get_cookie('subject')=='' || get_cookie('message') == '')
      {
        $this->input->set_cookie('output',"Please fill in all forms.", 1);
        header("Refresh:0 url=contact.html");
      }
      else
      {
        $this->Site_model->addFeedback([get_cookie('user'),get_cookie('subject'),get_cookie('message')]);
        $this->input->set_cookie('output',"Feedback sent.", 1);
        header("Refresh:0 url=contact.html");
      }
    }
  }
  public function reservation()
  {
    if ($this->input->post('email'))
    {
      $dat = $this->Site_model->user([$this->input->post('email'),$this->input->post('password')]);
      if ($dat)
      {
        $this->input->set_cookie('user',$this->input->post('email'),60);
        $this->session->set_userdata('userInfo', ['user'=>TRUE]);
        header("Refresh:0 url='home.html'");
      }
      else header("Refresh:0 url='home.html'");
    }
    else if(!$this->session->userdata('userInfo'))
    {
      header("Refresh:0 url='home.html'");
    }
    else if (!$this->input->cookie('user'))
    {
      header("Refresh:0 url='home.html'");
    }
    else
    {
      if (get_cookie('date')== '' && get_cookie('time') == '0' && get_cookie('seat') == '0')
      {
        $this->input->set_cookie('output',"", 1);
        header("Refresh:0 url=home.html");
      }
      else if (get_cookie('date')== '' || get_cookie('time') == '0' || get_cookie('seat') == '0')
      {
        $this->input->set_cookie('output',"Please fill in all forms.", 1);
        header("Refresh:0 url=home.html");
      }
      else
      {
        $timestamp = strtotime(get_cookie('date'));
        $data = $this->Site_model->checkReservation([get_cookie('user'),date("Y-m-d", $timestamp),get_cookie('time'),get_cookie('seat')]);
        if($data == 0)
        {
          $this->input->set_cookie('output',"Sorry, all table are full. Please choose a different time.", 1);
          header("Refresh:0 url=home.html");
        }
        else
        {
          $this->Site_model->addReservation([get_cookie('user'),date("Y-m-d", $timestamp),get_cookie('time'),$data]);
          $this->input->set_cookie('output',"Reservation placed.", 1);
          header("Refresh:0 url=home.html");
        }
      }
    }
  }
  public function account_reservation_del()
  {
    if(!$this->session->userdata('userInfo'))
    {
      header("Refresh:0 url='account.html");
    }
    else if (!$this->input->cookie('user'))
    {
      header("Refresh:0 url='account.html");
    }
    else
    {
      $id = $this->input->get('id');
      $this->Site_model->deleteReservation($id);
      header("Refresh:0 url=account.html");
    }
  }
  public function account()
  {
    if(!$this->session->userdata('userInfo'))
    {
      header("Refresh:0 url='home.html'");
    }
    else if (!$this->input->cookie('user'))
    {
      header("Refresh:0 url='home.html'");
    }
    else
    {
      $this->input->set_cookie('user',get_cookie('user'),60);
      $sql = $this->Site_model->account(get_cookie('user'));
      $data["res"] = $this->Site_model->accountReservation(get_cookie('user'));
      $data["url"] = "account.html";
      $data["title"] = get_cookie('user');
      $data["contain"] = $sql;
      $data["ord"] = $this->Site_model->accountOrder(get_cookie('user'));
      $data["logon"] = TRUE;
      $this->load->view('app/account',$data);
    }
  }
  public function account_edit()
  {
    if(!$this->session->userdata('userInfo'))
    {
      header("Refresh:0 url='home.html'");
    }
    else if (!$this->input->cookie('user'))
    {
      header("Refresh:0 url='home.html'");
    }
    else 
    {
      $config['upload_path']          = './image/user';
      $config['allowed_types']        = 'jpg|png';
      $this->load->library('upload', $config);
      if($this->upload->do_upload("uimg"))
      {
        $uploadData = $this->upload->data();
        $this->Site_model->addUserImg([$uploadData['file_name'],get_cookie('user')]);
        header("Refresh:0");
      }
      if ($this->input->post('name'))
      {
        $this->Site_model->editUser(['UFULLNAME',$this->input->post('name'),get_cookie('user')]);
      }
      if ($this->input->post('email'))
      {
        $this->Site_model->editUser(['UEMAIL',$this->input->post('email'),get_cookie('user')]);
      }
      if ($this->input->post('phone'))
      {
        $this->Site_model->editUser(['UPHONE',$this->input->post('phone'),get_cookie('user')]);
      }
      if ($this->input->post('address'))
      {
        $this->Site_model->editUser(['UADDRESS',$this->input->post('address'),get_cookie('user')]);
      }
      if ($this->input->post('street'))
      {
        $this->Site_model->editUser(['USTREET',$this->input->post('street'),get_cookie('user')]);
      }
      if ($this->input->post('province'))
      {
        $this->Site_model->editUser(['UPROVINCE',$this->input->post('province'),get_cookie('user')]);
      }
      $this->input->set_cookie('user',get_cookie('user'),60);
      $sql = $this->Site_model->account(get_cookie('user'));
      $data["url"] = "account-edit.html";
      $data["title"] = get_cookie('user');
      $data["contain"] = $sql;
      $data["logon"] = TRUE;
      $this->input->set_cookie('output1',"Info updated.", 1);
      $this->load->view('app/account_edit',$data);
    }
  }
  public function account_password()
  {
    if(!$this->session->userdata('userInfo'))
    {
      header("Refresh:0 url='home.html'");
    }
    else if (!$this->input->cookie('user'))
    {
      header("Refresh:0 url='home.html'");
    }
    else
    {
      $this->input->set_cookie('admin','admin',60);
      if($this->input->post('new') && $this->input->post('new_re'))
        $output = $this->Site_model->userpassword([$this->input->post('old'),$this->input->post('new'),$this->input->post('new_re'),get_cookie('user')]);
      else
        $output = "Please fill in all forms to change password.";
      $this->input->set_cookie('output2',$output, 1);
      header("Refresh:0 url='account-edit.html");
    }
  }
  public function account_reset()
  {
    if ($this->input->post('email'))
    {
      $data['re'] = $this->Site_model->resetAccount($this->input->post('email'));
      $this->load->view('app/account_reset',$data);
    }
    else
      $this->load->view('app/account_reset');
  }
  public function signup()
  {
      if ($this->input->post('name')
          && $this->input->post('remail')
          && $this->input->post('phone')
          && $this->input->post('rpassword')
          && $this->input->post('rpassword_re')
          && $this->input->post('address')
          && $this->input->post('street')
          && $this->input->post('province'))
      {
        if ($this->input->post('rpassword') != $this->input->post('rpassword_re'))
          $data["output"] = 'Password do not match';
        else if (strlen($this->input->post('rpassword')) < 8)
          $data["output"] = 'Password length must be at least 8 character';
        else if ((int)$this->input->post('phone') == 0)
          $data["output"] = 'Invalid phone';
          else if ((int)$this->input->post('address') == 0)
            $data["output"] = 'Invalid address';
        else
          $data["output"] =  $this->Site_model->signup([$this->input->post('name'),$this->input->post('remail'),$this->input->post('phone'),$this->input->post('rpassword'),$this->input->post('address'),$this->input->post('street'),$this->input->post('province')]);
      }
      else
      {
        $data["output"] = 'Please fill in all forms.';
      }
      $data["url"] = '/';
      $data["title"] = 'Sign up';
      $data["logon"] = FALSE;
      $this->load->view('app/signup',$data);
    
  }
  public function admin()
  {
    if ($this->input->post('username') && $this->input->post('password'))
    {
      $dat = $this->Site_model->admin([$this->input->post('username'),$this->input->post('password')]);
      if ($dat)
      {
        $this->input->set_cookie('admin','admin',60);
        $this->session->set_userdata('adminInfo', ['admin'=>TRUE]);
        $data["contain"] = $this->Site_model->listFeedback();
        $data['re'] = $this->Site_model->viewReservation();
        $data['set'] = $this->Site_model->viewReset();
        $data['ord'] = $this->Site_model->adminOrder();
        $this->load->view('admin/admin',$data);
      }
      else $this->load->view('admin/admin_login');
    }
    else if(!$this->session->userdata('adminInfo'))
    {
      $this->load->view('admin/admin_login');
    }
    else if (!$this->input->cookie('admin'))
    {
      $this->load->view('admin/admin_login');
    }
    else
    {
      $this->input->set_cookie('admin','admin',60);
      $data["contain"] = $this->Site_model->listFeedback();
      $data['re'] = $this->Site_model->viewReservation();
      $data['set'] = $this->Site_model->viewReset();
      $data['ord'] = $this->Site_model->adminOrder();
      $this->load->view('admin/admin',$data);
    }
  }
  public function admin_feedback_del()
  {
    $id = $this->input->get('id');
    $this->Site_model->deleteFeedback($id);
    header("Refresh:0 url=admin.html");
  }
  public function admin_feedback_done()
  {
    $id = $this->input->get('id');
    $this->Site_model->doneFeedback($id);
    header("Refresh:0 url=admin.html");
  }
  public function admin_logout()
  {
    $this->session->unset_userdata('adminInfo');
    header("Refresh:0 url=admin.html");
  }
  public function admin_home()
  {
    if(!$this->session->userdata('adminInfo'))
    {
      header("Refresh:0 url=admin.html");
    }
    else if (!$this->input->cookie('admin'))
    {
      header("Refresh:0 url=admin.html");
    }
    else
    {
      $this->input->set_cookie('admin','admin',60);
      $data["contain"] = $this->Site_model->home();
      if ($this->input->post('tittle'))
      {
        $title = $this->input->post('tittle');
        $this->Site_model->updateHomeTittle($title);
        header("Refresh:0");
      }
      elseif ($this->input->post('content'))
      {
        $content = $this->input->post('content');
        $this->Site_model->editHomeContent($content);
        header("Refresh:0");
      }
      $this->load->view('admin/admin_home',$data);
    }
  }
  public function admin_home_del()
  {
    $this->Site_model->deleteHomeContent();
    header("Refresh:0 url=admin-home.html");
  }
  public function admin_restaurant_col()
  {
    if(!$this->session->userdata('adminInfo'))
    {
      header("Refresh:0 url=admin.html");
    }
    else if (!$this->input->cookie('admin'))
    {
      header("Refresh:0 url=admin.html");
    }
    else
    {
      $this->input->set_cookie('admin','admin',60);
      $data["contain"] = $this->Site_model->restaurant();
      if ($this->input->post('tittle'))
      {
        $title = $this->input->post('tittle');
        $this->Site_model->updateRestaurantTittle($title);
        header("Refresh:0");
      }
      elseif ($this->input->post('paragraph'))
      {
        if($this->input->post('id'))
        {
          $paragraph = [$this->input->post('id'),$this->input->post('paragraph')];
          $this->Site_model->editRestaurantParagraph($paragraph);
          header("Refresh:0");
        }
        else
        {
          $paragraph = [$data["contain"][count($data["contain"])-2]+1,$this->input->post('paragraph')];
          $this->Site_model->addRestaurantParagraph($paragraph);
          header("Refresh:0");
        }
      }
      $this->load->view('admin/admin_restaurant_col',$data);
    }
  }
  public function admin_restaurant_col_del()
  {
    $id = $this->input->get('id');
    $this->Site_model->deleteRestaurantParagraph($id);
    header("Refresh:0 url=admin-restaurant-col.html");
  }
  public function admin_restaurant_box()
  {
    if(!$this->session->userdata('adminInfo'))
    {
      header("Refresh:0 url=admin.html");
    }
    else if (!$this->input->cookie('admin'))
    {
      header("Refresh:0 url=admin.html");
    }
    else
    {
      $this->input->set_cookie('admin','admin',60);
      $data["contain"] = $this->Site_model->imgRestaurant();
      $config['upload_path']          = './image/restaurant.html';
      $config['allowed_types']        = 'jpg|png';
      $this->load->library('upload', $config);
      if($this->upload->do_upload("img"))
      {
        if ($this->input->post('id'))
        {
          $uploadData = $this->upload->data();
          $id = $this->input->post('id');
          $this->Site_model->editRestaurantImg([$id,$uploadData['file_name']]);
          header("Refresh:0");
        }
        else
        {
          $uploadData = $this->upload->data();
          $this->Site_model->addRestaurantImg([$data["contain"][count($data["contain"])-2]+1,$uploadData['file_name']]);
          header("Refresh:0");
        }
      }
      $this->load->view('admin/admin_restaurant_box',$data);
    }
  }
  public function admin_restaurant_box_del()
  {
    $id = $this->input->get('id');
    $this->Site_model->deleteRestaurantImg($id);
    header("Refresh:0 url=admin-restaurant-box.html");
  }
  public function admin_contact()
  {
    if(!$this->session->userdata('adminInfo'))
    {
      header("Refresh:0 url=admin.html");
    }
    else if (!$this->input->cookie('admin'))
    {
      header("Refresh:0 url=admin.html");
    }
    else
    {
      $this->input->set_cookie('admin','admin',60);
      $title = "Contact";
      $sql = $this->Site_model->contact();
      $data["title"] = $title;
      $data["contain"] = $sql;
      if ($this->input->post('name'))
      {
        $this->Site_model->editContact(['CNAME',$this->input->post('name')]);
        header("Refresh:0");
      }
      if ($this->input->post('email'))
      {
        $this->Site_model->editContact(['CEMAIL',$this->input->post('email')]);
        header("Refresh:0");
      }
      if ($this->input->post('phone'))
      {
        $this->Site_model->editContact(['CPHONE',$this->input->post('phone')]);
        header("Refresh:0");
      }
      if ($this->input->post('address'))
      {
        $this->Site_model->editContact(['CADDRESS',$this->input->post('address')]);
        header("Refresh:0");
      }
      if ($this->input->post('street'))
      {
        $this->Site_model->editContact(['SCTREET',$this->input->post('street')]);
        header("Refresh:0");
      }
      if ($this->input->post('province'))
      {
        $this->Site_model->editContact(['CPROVINCE',$this->input->post('province')]);
        header("Refresh:0");
      }
      if ($this->input->post('map'))
      {
        $this->Site_model->editContact(['CMAP',$this->input->post('map')]);
        header("Refresh:0");
      }
      if ($this->input->post('open'))
      {
        $this->Site_model->editContact(['COPEN',$this->input->post('open')]);
        header("Refresh:0");
      }
      if ($this->input->post('close'))
      {
        $this->Site_model->editContact(['CCLOSE',$this->input->post('close')]);
        header("Refresh:0");
      }
      $this->load->view('admin/admin_contact',$data);
    }
  }
  public function admin_user()
  {
    if(!$this->session->userdata('adminInfo'))
    {
      header("Refresh:0 url=admin.html");
    }
    else if (!$this->input->cookie('admin'))
    {
      header("Refresh:0 url=admin.html");
    }
    else
    {
      $this->input->set_cookie('admin','admin',60);
      $data["contain"] = $this->Site_model->listAccount();
      $this->load->view('admin/admin_user',$data);
    }
  }
  public function admin_user_del()
  {
    $id = $this->input->get('id');
    $this->Site_model->deleteUser($id);
    header("Refresh:0 url=admin-user.html");
  }
  public function admin_password()
  {
    if(!$this->session->userdata('adminInfo'))
    {
      header("Refresh:0 url=admin.html");
    }
    else if (!$this->input->cookie('admin'))
    {
      header("Refresh:0 url=admin.html");
    }
    else
    {
      $this->input->set_cookie('admin','admin',60);
      if($this->input->post('old') && $this->input->post('new') && $this->input->post('new_re'))
        $data["output"] = $this->Site_model->adminpassword([$this->input->post('old'),$this->input->post('new'),$this->input->post('new_re')]);
      else
        $data['output'] = "Please fill in all forms to change password.";
      $this->load->view('admin/admin_password',$data);
    }
  }
  public function admin_table()
  {
    if(!$this->session->userdata('adminInfo'))
    {
      header("Refresh:0 url=admin.html");
    }
    else if (!$this->input->cookie('admin'))
    {
      header("Refresh:0 url=admin.html");
    }
    else
    {
      $this->input->set_cookie('admin','admin',60);
      $data["contain"] = $this->Site_model->listTable();
      if ($this->input->post('seat'))
      {
        if ($this->input->post('id'))
        {
          $this->Site_model->editTable([(int)$this->input->post('id'),(int)$this->input->post('seat')]);
          header("Refresh:0");
        }
        else
        {
          $this->Site_model->addTable([$data["contain"][count($data["contain"])-2]+1,(int)$this->input->post('seat')]);
          header("Refresh:0");
        }
      }
      $this->load->view('admin/admin_table',$data);
    }
  }
  public function admin_user_view()
  {
    if(!$this->session->userdata('adminInfo'))
    {
      header("Refresh:0 url=admin.html");
    }
    else if (!$this->input->cookie('admin'))
    {
      header("Refresh:0 url=admin.html");
    }
    else
    {
      $this->input->set_cookie('admin','admin',60);
      $id = $this->input->get('id');
      $data["contain"] = $this->Site_model->accountReservation($id);
      $data["ord"] = $this->Site_model->accountOrder($id);
      $this->load->view('admin/admin_user_view',$data);
    }
  }
  public function admin_reset()
  {
    if(!$this->session->userdata('adminInfo'))
    {
      header("Refresh:0 url=admin.html");
    }
    else if (!$this->input->cookie('admin'))
    {
      header("Refresh:0 url=admin.html");
    }
    else
    {
      $this->input->set_cookie('admin','admin',60);
      $id = $this->input->get('id');
      $data["contain"] = $this->Site_model->userReset($id);
      header("Refresh:0 url=admin.html");
    }
  }
  public function admin_menu()
  {
    if(!$this->session->userdata('adminInfo'))
    {
      header("Refresh:0 url=admin.html");
    }
    else if (!$this->input->cookie('admin'))
    {
      header("Refresh:0 url=admin.html");
    }
    else
    {
      $config['upload_path']          = './image/menu';
      $config['allowed_types']        = 'jpg|png';
      $this->load->library('upload', $config);
      if ($this->input->post('id'))
      {
        $id = $this->input->post('id');
        if($this->upload->do_upload("img"))
        {
          $uploadData = $this->upload->data();
          $this->Site_model->editMenu(['MIMG',$uploadData['file_name'],$id]);
        }
        if ($this->input->post('name'))
        {
          $this->Site_model->editMenu(['MNAME',$this->input->post('name'),$id]);
        }
        if ($this->input->post('content'))
        {
          $this->Site_model->editMenu(['MCONTENT',$this->input->post('content'),$id]);
        }
        if ($this->input->post('price'))
        {
          $this->Site_model->editMenu(['MPRICE',$this->input->post('price'),$id]);
        }
      }
      else
      {
        if($this->upload->do_upload("img")
          && $this->input->post('name')
          && $this->input->post('content')
          && $this->input->post('price'))
        {
          $uploadData = $this->upload->data();
          $this->Site_model->addMenu([$uploadData['file_name'],$this->input->post('name'),$this->input->post('content'),$this->input->post('price')]);
          $data["result"] = 'Item added.';
        }
        else
        $data["result"] = 'Please fill in all forms.';
      }
      $this->input->set_cookie('admin','admin',60);
      $array = $this->Site_model->menuAdmin();
      if ($this->input->get('p'))
        $start = ($this->input->get('p')-1)*30;
      else
        $start = 0;
      $data["contain"] = array_slice($array,$start,30);
      $data["page"] = ceil(sizeof($array)/30);
      $this->load->view('admin/admin_menu',$data);
    }
  }
  public function admin_menu_del()
  {
    $this->Site_model->deleteMenu($this->input->get('id'));
    header("Refresh:0 url=admin-menu.html");
  }
}