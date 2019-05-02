<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function home()
  {
    $query = $this->db->query('SELECT * FROM HOME;');
    foreach ($query->result() as $home)
    {
      return [$home->HTITTLE,$home->HCONTAIN];
    }
  }
  public function updateHomeTittle($data)
  {
    $query = "UPDATE HOME SET HTITTLE = '".$data."'";
    $this->db->query($query);
  }
  public function deleteHomeContent()
  {
    $query = "UPDATE HOME SET HCONTAIN = ''";
    $this->db->query($query);
  }
  public function editHomeContent($data)
  {
    $query = "UPDATE HOME SET HCONTAIN = '".$data."'";
    $this->db->query($query);
  }

  public function restaurant()
  {
    $query = $this->db->query('SELECT * from RESTAURANT');
    $output = ["restaurant"];
    foreach ($query->result() as $restaurant)
    {
      array_push($output,$restaurant->RID,$restaurant->RCONTAIN);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function updateRestaurantTittle($data)
  {
    $query = "UPDATE RESTAURANT SET RCONTAIN = '".$data."' WHERE RID = 0";
    $this->db->query($query);
  }
  public function addRestaurantParagraph($data)
  {
    $query = 'INSERT INTO RESTAURANT(RID, RCONTAIN) VALUES ("'.$data[0].'", "'.$data[1].'")';
    $this->db->query($query);
  }
  public function deleteRestaurantParagraph($data)
  {
    $query = 'DELETE FROM RESTAURANT WHERE RID='.$data;
    $this->db->query($query);
  }
  public function editRestaurantParagraph($data)
  {
    $query = 'UPDATE RESTAURANT SET RESTAURANT.RCONTAIN = "'.$data[1].'" WHERE RESTAURANT.RID = "'.$data[0].'"';
    $this->db->query($query);
  }
  public function imgRestaurant()
  {
    $query = $this->db->query('SELECT * from RES_IMG');
    $output = ["restaurant"];
    foreach ($query->result() as $img)
    {
      array_push($output,$img->RIID,$img->RIMG);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function addRestaurantImg($data)
  {
    $query = 'INSERT INTO RES_IMG(RIID,RIMG) VALUES ("'.$data[0].'","'.$data[1].'")';
    $this->db->query($query);
  }
  public function deleteRestaurantImg($data)
  {
    $delete = $this->db->query('SELECT RIMG FROM RES_IMG WHERE RIID='.$data);
    foreach ($delete->result() as $del)
    {
      unlink("image/restaurant/".$del->RIMG);
    }
    $query = 'DELETE FROM RES_IMG WHERE RIID='.$data;
    $this->db->query($query);
  }
  public function editRestaurantImg($data)
  {
    $delete = $this->db->query('SELECT RIMG FROM RES_IMG WHERE RIID='.$data[0]);
    foreach ($delete->result() as $del)
    {
      unlink("image/restaurant/".$del->RIMG);
    }
    $query = 'UPDATE RES_IMG SET RES_IMG.RIMG = "'.$data[1].'" WHERE RES_IMG.RIID = "'.$data[0].'"';
    $this->db->query($query);
  }
  public function contact()
  {
    $query = $this->db->query('SELECT * from CONTACT');
    $output = ["contact"];
    foreach ($query->result() as $contact)
    {
      array_push($output,$contact->CTITTLE,$contact->CNAME,$contact->CEMAIL,$contact->CPHONE,$contact->CADDRESS,$contact->CSTREET,$contact->CPROVINCE,$contact->COPEN,$contact->CCLOSE,$contact->CMAP);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function editContact($data)
  {
    $query = 'UPDATE CONTACT SET CONTACT.'.$data[0].' = "'.$data[1].'"';
    $this->db->query($query);
  }
  public function admin($data)
  {
    $query = $this->db->query('SELECT AUSERNAME, APASSWORD FROM WEBADMIN;');
    foreach ($query->result() as $ad)
    {
      if ($data[0] == $ad->AUSERNAME && $data[1] == $ad->APASSWORD ) return TRUE;
    }
    return FALSE;
  }
  public function adminpassword($data)
  {
    $query = $this->db->query('SELECT APASSWORD FROM WEBADMIN;');
    foreach ($query->result() as $ad)
    {
      if ($data[0] != $ad->APASSWORD)
        return "Wrong old password.";
      else if ($data[1] != $data[2])
        return "Password do not match.";
      else
      {
        $this->db->query('UPDATE WEBADMIN SET WEBADMIN.APASSWORD = "'.$data[1].'" WHERE WEBADMIN.APASSWORD = "'.$data[0].'"');
        return "Password changed.";
      }
    }
  }
  public function user($data)
  {
    $query = $this->db->query('SELECT UEMAIL, UPASSWORD FROM WEBACCOUNT;');
    foreach ($query->result() as $user)
    {
      if ($data[0] == $user->UEMAIL && $data[1] == $user->UPASSWORD ) return TRUE;
    }
    return FALSE;
  }
  public function addFeedback($data)
  {
    $zer = 0;
    $query = 'INSERT INTO FEEDBACK(UEMAIL, FSUBJECT, FMESSAGE, FVIEW) VALUES ("'.$data[0].'", "'.$data[1].'", "'.$data[2].'", "'.$zer.'")';
    $this->db->query($query);
  }
  public function account($data)
  {
    $query = $this->db->query('SELECT UEMAIL, UFULLNAME, UPHONE, UADDRESS, USTREET, UPROVINCE, UIMG FROM WEBACCOUNT WHERE UEMAIL = "'.$data.'";');
    $output = ["account"];
    foreach ($query->result() as $user)
    {
      array_push($output,$user->UEMAIL,$user->UFULLNAME,$user->UPHONE,$user->UADDRESS,$user->USTREET,$user->UPROVINCE,$user->UIMG);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function listAccount()
  {
    $query = $this->db->query('SELECT UEMAIL, UFULLNAME, UPHONE, UADDRESS, USTREET, UPROVINCE, UIMG FROM WEBACCOUNT;');
    $output = ["account"];
    foreach ($query->result() as $user)
    {
      array_push($output,$user->UEMAIL,$user->UFULLNAME,$user->UPHONE,$user->UADDRESS,$user->USTREET,$user->UPROVINCE,$user->UIMG);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function listFeedback()
  {
    $query = $this->db->query('SELECT FID, UEMAIL, FSUBJECT, FMESSAGE, FVIEW FROM FEEDBACK;');
    $output = ["feedback"];
    foreach ($query->result() as $feedback)
    {
      array_push($output,$feedback->FID,$feedback->UEMAIL,$feedback->FSUBJECT,$feedback->FMESSAGE,$feedback->FVIEW);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function deleteFeedback($data)
  {
    $query = 'DELETE FROM FEEDBACK WHERE FID='.$data;
    $this->db->query($query);
  }
  public function doneFeedback($data)
  {
    $query = 'UPDATE FEEDBACK SET FEEDBACK.FVIEW = 1 WHERE FEEDBACK.FID = '.$data;
    $this->db->query($query);
  }
  public function deleteUser($data)
  {
    $query = 'DELETE FROM WEBACCOUNT WHERE UEMAIL="'.$data.'"';
    $this->db->query($query);
  }
  public function listTable()
  {
    $query = $this->db->query('SELECT TID, TSEAT FROM WEBTABLE;');
    $output = ["table"];
    foreach ($query->result() as $table)
    {
      array_push($output,$table->TID,$table->TSEAT);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function addTable($data)
  {
    $this->db->insert('WEBTABLE', ['TID'=>$data[0],'TSEAT'=>$data[1]]);
  }
  public function editTable($data)
  {
    $query = 'UPDATE WEBTABLE SET WEBTABLE.TSEAT = '.$data[1].' WHERE WEBTABLE.TID = '.$data[0];
    $this->db->query($query);
  }
  public function addReservation($data)
  {
    $query = 'INSERT INTO RESERVATION(UEMAIL, TID, RDATE, RTIME) VALUES ("'.$data[0].'", '.$data[3].', "'.$data[1].'", '.$data[2].')';
    $this->db->query($query);
  }
  public function checkReservation($data)
  {
    $query = $this->db->query('SELECT TID FROM WEBTABLE WHERE TSEAT >= '.$data[3].' and TID NOT IN (SELECT RESERVATION.TID FROM RESERVATION where RESERVATION.RDATE = "'.$data[1].'" AND RESERVATION.RTIME = '.$data[2].')  ORDER BY TSEAT ASC ;');
    $output = ["reservation"];
    foreach ($query->result() as $reservation)
    {
      array_push($output,$reservation->TID);
    }
    if(count($output)>1)
      return $output[1];
    else
      return 0;
  }
  public function viewReservation()
  {
    $query = $this->db->query('SELECT REID ,WEBTABLE.TID, TSEAT, UEMAIL, RDATE, RTIME FROM WEBTABLE, RESERVATION WHERE RESERVATION.TID = WEBTABLE.TID;');
    $output = ["reservation"];
    foreach ($query->result() as $reservation)
    {
      array_push($output,$reservation->REID,$reservation->TID,$reservation->TSEAT,$reservation->UEMAIL,$reservation->RDATE,$reservation->RTIME);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function accountReservation($data)
  {
    $query = $this->db->query('SELECT REID ,WEBTABLE.TID, TSEAT, UEMAIL, RDATE, RTIME FROM WEBTABLE, RESERVATION WHERE RESERVATION.TID = WEBTABLE.TID AND UEMAIL="'.$data.'";');
    $output = ["reservation"];
    foreach ($query->result() as $reservation)
    {
      array_push($output,$reservation->REID,$reservation->TID,$reservation->TSEAT,$reservation->RDATE,$reservation->RTIME);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function deleteReservation($data)
  {
    $query = 'DELETE FROM RESERVATION WHERE REID='.$data;
    $this->db->query($query);
  }
  public function editUser($data)
  {
    $query = 'UPDATE WEBACCOUNT SET WEBACCOUNT.'.$data[0].' = "'.$data[1].'" WHERE UEMAIL = "'.$data[2].'"';
    $this->db->query($query);
  }
  public function userpassword($data)
  {
    $query = $this->db->query('SELECT UPASSWORD FROM WEBACCOUNT WHERE UEMAIL = "'.$data[3].'"');
    foreach ($query->result() as $ad)
    {
      if ($data[0] != $ad->UPASSWORD)
        return "Wrong old password.";
      else if ($data[1] != $data[2])
        return "Password do not match.";
      else
      {
        $this->db->query('UPDATE WEBACCOUNT SET WEBACCOUNT.UPASSWORD = "'.$data[1].'" WHERE WEBACCOUNT.UEMAIL = "'.$data[3].'"');
        return "Password changed.";
      }
    }
  }
  public function resetAccount($data)
  {
    $query = $this->db->query('SELECT UEMAIL FROM WEBACCOUNT WHERE UEMAIL = "'.$data.'"');
    if(!$query->result())
      return "This email is unregistered. Please sign up your email.";

    foreach ($query->result() as $ad)
    {
      $this->db->query('INSERT INTO RESETACCOUNT(UEMAIL, RDONE) VALUES ("'.$data.'", "0")');
      return "Thank you. We will reset your account shortly.";
    }
  }
  public function signup($data)
  {
    $query = 'INSERT INTO WEBACCOUNT(UEMAIL, UPASSWORD, UFULLNAME, UPHONE, UADDRESS, USTREET, UPROVINCE, UIMG) VALUES ("'.$data[1].'", "'.$data[3].'","'.$data[0].'","'.$data[2].'","'.$data[4].'","'.$data[5].'","'.$data[6].'","default.png")';
    $this->db->query($query);
      return "Account signed up.";
  }
  public function addUserImg($data)
  {
    $quer =  $this->db->query('SELECT UIMG FROM WEBACCOUNT WHERE UEMAIL = "'.$data[1].'"');
    foreach ($quer->result() as $img)
    {
      if ($img->UIMG != 'default.png')
        unlink("image/user/".$img->UIMG);
    }
    $query = 'UPDATE WEBACCOUNT SET WEBACCOUNT.UIMG = "'.$data[0].'" WHERE UEMAIL = "'.$data[1].'"';
    $this->db->query($query);
  }
  public function viewReset()
  {
    $query =  $this->db->query('SELECT RSID, UIMG, WEBACCOUNT.UEMAIL, UFULLNAME, UPHONE, UADDRESS, USTREET, UPROVINCE FROM WEBACCOUNT, RESETACCOUNT WHERE WEBACCOUNT.UEMAIL = RESETACCOUNT.UEMAIL AND RDONE = 0');
    $output = ["reservation"];
    foreach ($query->result() as $reset)
    {
      array_push($output,$reset->RSID,$reset->UIMG,$reset->UEMAIL,$reset->UFULLNAME,$reset->UPHONE,$reset->UADDRESS,$reset->USTREET,$reset->UPROVINCE);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function userReset($data)
  {
    $query =  'UPDATE  WEBACCOUNT SET UPASSWORD = "" WHERE UEMAIL IN (SELECT UEMAIL FROM RESETACCOUNT WHERE  RSID = '.$data.')';
    $this->db->query($query);
    $query =  'UPDATE  RESETACCOUNT SET RDONE = 1 WHERE RSID = '.$data;
    $this->db->query($query);
  }
  public function menu()
  {
    $query =  $this->db->query('SELECT MID, MIMG, MNAME, MCONTENT, MPRICE, MTYPE FROM MENU ORDER BY MNAME ASC');
    $output = ["menu"];
    foreach ($query->result() as $menu)
    {
      array_push($output,$menu->MID,$menu->MIMG,$menu->MNAME,$menu->MCONTENT,$menu->MPRICE,$menu->MTYPE);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function menuLimit($data)
  {
    $query =  $this->db->query('SELECT MID, MIMG, MNAME, MCONTENT, MPRICE, MTYPE FROM MENU WHERE MTYPE = "'.$data.'" ORDER BY MNAME ASC');
    $output = ["menu"];
    foreach ($query->result() as $menu)
    {
      array_push($output,$menu->MID,$menu->MIMG,$menu->MNAME,$menu->MCONTENT,$menu->MPRICE,$menu->MTYPE);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function menuAdmin()
  {
    $query =  $this->db->query('SELECT MID, MIMG, MNAME, MCONTENT, MPRICE, MTYPE FROM MENU');
    $output = ["menu"];
    foreach ($query->result() as $menu)
    {
      array_push($output,$menu->MID,$menu->MIMG,$menu->MNAME,$menu->MCONTENT,$menu->MPRICE,$menu->MTYPE);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function order($data)
  {
    $this->db->insert('WEBORDER', $data);
    $id = $this->db->insert_id();
    return (isset($id)) ? $id : FALSE;
  }
  public function orderDetail($data)
  {
    $this->db->insert('ORDERDETAIL', $data);
  }
  public function accountOrder($data)
  {
    $query =  $this->db->query('SELECT OID, ODATE, PID, PQUANTITY, PPRICE FROM WEBORDER NATURAL JOIN ORDERDETAIL WHERE UEMAIL = "'.$data.'"');
    $output = ["order"];
    foreach ($query->result() as $order)
    {
      array_push($output,$order->OID,$order->ODATE, $order->PID, $order->PQUANTITY,$order->PPRICE);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function adminOrder()
  {
    $query =  $this->db->query('SELECT OID, ODATE, PID, PQUANTITY, PPRICE, UFULLNAME, UADDRESS, USTREET, UPROVINCE FROM WEBORDER NATURAL JOIN ORDERDETAIL NATURAL JOIN WEBACCOUNT');
    $output = ["order"];
    foreach ($query->result() as $order)
    {
      array_push($output,$order->OID,$order->ODATE,$order->PID, $order->PQUANTITY,$order->PPRICE, $order->UFULLNAME, $order->UADDRESS, $order->USTREET, $order->UPROVINCE);
    }
    array_splice($output,0,1);
    return $output;
  }
  public function orderDel($data)
  {
    $query = 'DELETE FROM ORDERDETAIL WHERE OID='.$data[0].' AND PID = '.$data[1];
    $this->db->query($query);
  }
  public function editMenu($data)
  {
    $query = 'UPDATE MENU SET MENU.'.$data[0].' = "'.$data[1].'" WHERE MID = "'.$data[2].'"';
    $this->db->query($query);
  }
  public function addMenu($data)
  {
    $query = 'INSERT INTO MENU(MIMG, MNAME, MCONTENT, MPRICE) VALUES ("'.$data[0].'", "'.$data[1].'","'.$data[2].'", '.$data[3].')';
    $this->db->query($query);
  }
  public function deleteMenu($data)
  {
    $query = 'DELETE FROM MENU WHERE MID='.$data;
    $this->db->query($query);
  }
}