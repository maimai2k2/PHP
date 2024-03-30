<?php
include "./model/SanPham.php";
include "./model/KhachHang.php";
include "./model/NhanVien.php";
include "./model/HoaDon.php";
include "./model/CT_HoaDon.php";
include "./model/KhoiLuong.php";
include "./model/Gia.php";

class Controller
{
    public $MODEL_SANPHAM;
    public $MODEL_KH_KHA;
    public $MODEL_SP_THAO;
    public $MODEL_KH_THAO;
    public $MODEL_NV_THAO;
    public $MODEL_HD_THAO;
    public $MODEL_CTHD_THAO;
    public $MODEL_KL_THAO;
    public $MODEL_GIA_THAO;
    public function __construct(){
        $this->MODEL_SANPHAM = new SanPham();
        $this->MODEL_KH_KHA = new KhachHang();
        $this->MODEL_SP_THAO = new SanPham();
        $this->MODEL_KH_THAO = new KhachHang();
        $this->MODEL_NV_THAO = new NhanVien();
        $this->MODEL_HD_THAO = new HoaDon();
        $this->MODEL_CTHD_THAO = new ct_hoaDon();
        $this->MODEL_KL_THAO = new KhoiLuong();
        $this->MODEL_GIA_THAO = new gia();
    }
    public function SanPham(){
        include_once './view/Home.php';
     }
     public function TimKiem()
     {
         $sanpham = $this->MODEL_SANPHAM->timKiem($_REQUEST['search']);
        include_once './view/timKiem.php';
     }
     public function PhanLoai()
     {
         $phanloai = $this->MODEL_SANPHAM->PhanLoai($_REQUEST['loai']);
        include_once './view/LoaiSP.php';
     }
     public function index()
     {
         include_once './view/DangNhap.php';
      }
   public function ChiTietSanPham(){
      $SP = new SanPham();
      $SP = $this->MODEL_SANPHAM->getId($_REQUEST['id']);  
      include_once './view/ThongTinChiTiet.php';
  }
  public function ChiTietKhachHang(){
        $KH = new KhachHang();
        $KH = $this->MODEL_KH_KHA->getCustomerInfo($_REQUEST['id']);  
        //$KH = $this->MODEL_KH_KHA->getCustomerInfo("KH009");
        include_once './view/ThongTinKhachHang.php';
    }
    public function update(){
        
        $alm = new KhachHang();
        $alm = $this->MODEL_KH_KHA->checkID($_REQUEST['id']);

        include_once './view/SuaThongTinKhachHang.php';
    }

    public function check(){
        $alm = new KhachHang();
        $alm->id_kh = $_POST['txt_idkh'];
        $alm->tenKH = $_POST['txt_ten'];
        $alm->GT = $_POST['txt_GT'];
        $alm->NgaySinh = $_POST['txt_ngaysinh'];
        $alm->gmail = $_POST['txt_gmail'];
        $alm->DT = $_POST['txt_diachi'];
        $alm->Password = $_POST['txt_password'];

        var_dump($alm->tenKH);
        var_dump($_POST['txt_ten']);

        $this->MODEL_KH_KHA->updateKhachHang($alm);

        // $alm->id_sp != "" ? $this->MODEL->update($alm) : $this->MODEL->insert($alm);

        header("Location: index.php");
 
    }
    public function XoaKhoiGioHang(){
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            
            $row = $this->MODEL_SANPHAM->getOrder($id);
     
            if(!isset($_SESSION['carts']) || empty($_SESSION['carts']))
            {
                $_SESSION['carts'][$id] = $row;
                $_SESSION['carts'][$id]['SoLuong'] = 1;
            }
            else
            {
                if(array_key_exists($id , $_SESSION['carts']))
                {
                    
                    $_SESSION['carts'][$id]['SoLuong'] -= 1;
                    if($_SESSION['carts'][$id]['SoLuong'] <= 0)
                    {
                        //$_SESSION['carts'][$id] = $this->MODEL_SP->delete($id);
                        $_SESSION['carts'][$id] = $_SESSION['carts'];
                    }
                }
                else
                {
                    $_SESSION['carts'][$id] = $row;
                    $_SESSION['carts'][$id]['SoLuong'] = 1;
                }
            }
     
     
         //    echo "<pre>";
         //    print_r($row);
         //    print_r($_SESSION['carts']);
         //    print_r($_SESSION['carts']['SP001']);
         //    echo "</pre>";
            include_once './view/GioHang.php';
        }
        else
        {
            header("Location: index.php");
        }
     }
     
     public function XoaKhoiGioHangAll(){
         if(isset($_GET['id']))
         {
             $id = $_GET['id'];
             
             $row = $this->MODEL_SANPHAM->getOrder($id);
      
             if(!isset($_SESSION['carts']) || empty($_SESSION['carts']))
             {
                 $_SESSION['carts'][$id] = $row;
                 $_SESSION['carts'][$id]['SoLuong'] = 1;
             }
             else
             {
                 if(array_key_exists($id , $_SESSION['carts']))
                 {
                     $_SESSION['carts'] = empty($_SESSION['carts']);
                 }
                 else
                 {
                     $_SESSION['carts'][$id] = $row;
                     $_SESSION['carts'][$id]['SoLuong'] = 1;
                 }
             }
      
      
             include_once './view/GioHang.php';
         }
         else
         {
             header("Location: index.php");
         }
      }

    public function GioHang(){
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            $sohd = $this->MODEL_HD_THAO->getID_HD();
            if($sohd > 9)
            {
                $id_hd = 'HD0'.$sohd;
            }
            else
            {
                $id_hd = 'HD00'.$sohd;
            }
            
            $row = $this->MODEL_SANPHAM->getOrder($id);
            $tt = $this->MODEL_SANPHAM->getTT("KH009");

            $kq = array_merge($row , $tt);


            if(!isset($_SESSION['carts']) || empty($_SESSION['carts']))
            {
                $_SESSION['carts'][$id] = $kq;
                
                $_SESSION['carts'][$id]['SoLuong'] = 1;
            }
            else
            {
                if(array_key_exists($id , $_SESSION['carts']))
                {
                    $_SESSION['carts'][$id]['SoLuong'] += 1;

                }
                else
                {
                    $_SESSION['carts'][$id] = $kq;
                    $_SESSION['carts'][$id]['SoLuong'] = 1;
                }
            }

            $this->MODEL_SANPHAM->insertCT($_SESSION['carts'][$id]['ID_SP'], $id_hd, $_SESSION['carts'][$id]['SoLuong']);

            //    echo "<pre>";
            //    print_r($row);
            //    print_r($_SESSION['carts']);
            //    print_r($_SESSION['carts'][$id]['ID_SP']);
            //    print_r($id);
            //    print_r($_SESSION['carts'][$id]['SoLuong']);
            //    echo "</pre>";
                include_once './view/GioHang.php';
        }
        else
        {
            header("Location: index.php");
        }
    // include_once './view/GioHang.php';
    }

    public function Bill(){
        //id_hd
        $sohd = $this->MODEL_HD_THAO->getID_HD();
        $sohd += 1;
        if($sohd > 9)
        {
            $id_hd = 'HD0'.$sohd;
        }
        else
        {
            $id_hd = 'HD00'.$sohd;
        }
        //id_kh
        $file = fopen("view/user.txt", "r");
        $gmail = fread($file, filesize("view/user.txt"));
        fclose($file);
        include("config/connectDB.php");
        $sql = "select ID_KH from khachhang where Gmail = '$gmail'";
        $smt = $pdo->prepare($sql);
        $smt->execute();
        $thao = $smt->fetch(PDO::FETCH_ASSOC);
        $id_kh = $thao["ID_KH"];
        $date = date('y-m-d h:i:s');

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            
            $row = $this->MODEL_SANPHAM->getOrder($id);
            $tt = $this->MODEL_SANPHAM->getTT("KH009");

            $tongSL = 0;
            $tongTien = 0;
            $tienShip = 25000;
            if(isset($_SESSION['carts']) && !empty($_SESSION['carts']))
            {
                foreach($_SESSION['carts'] as $key => $value)
                {
                    $tong = (float)$value["Gia"]*(int)$value["SoLuong"];
                    $tongTien += $tong;
                    $tongSL += $value['SoLuong'];	
                    $tongTien += $tienShip;
                    
                }
            }

            
            $this->MODEL_SANPHAM->insertHD($id_hd , $id_kh, 'NV001', $date, $tongTien, $tienShip, 'Đang xử lý' , 'Chưa thanh toán');

            $kq = array_merge($row , $tt);

            if(!isset($_SESSION['carts']) || empty($_SESSION['carts']))
            {
                $_SESSION['carts'][$id] = $kq;
                
            }



    //    echo "<pre>";
    //    print_r($row);
    //    print_r($_SESSION['carts']);
    //    echo "</pre>";
            include_once './view/Bill.php';
        }
        else
        {
            header("Location: index.php");
        }
    // include_once './view/GioHang.php';
    }

    public function ThanhToan(){
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            
            $row = $this->MODEL_SANPHAM->getOrder($id);
            $tt = $this->MODEL_SANPHAM->getTT("KH009");

            $kq = array_merge($row , $tt);

            if(!isset($_SESSION['carts']) || empty($_SESSION['carts']))
            {
                $_SESSION['carts'][$id] = $kq;
            }

            //    echo "<pre>";
            //    print_r($row);
            //    print_r($tt);
            //    print_r($kq);
            //    print_r($_SESSION['carts']);
            //    echo "</pre>";
            include_once './view/Success.php';
        }
        else
        {
            header("Location: index.php");
        }
        // include_once './view/GioHang.php';
    }

    //THAO//
    public function login()
    {   
        $kh = new KhachHang();
        $kh->gmail = $_POST['account'];
        $kh->Password = $_POST['pass'];

        $count = $this->MODEL_KH_THAO->checkAccount($kh->gmail, $kh->Password);
        if($count != 0)
        {
            $noidung = $kh->gmail;
            $f = fopen("view/user.txt","w+");
            fwrite($f,$noidung);
            fclose($f);

            include_once './view/Home.php';
        }
        else
        {
            $count2 = $this->MODEL_NV_THAO->checkAccount($kh->gmail, $kh->Password);
            if($count2 != 0)
            {
                include_once './view/T_quanlysanpham.php';
            }
            else
            {
                include_once './view/DangNhap.php';
                $tb = "Đăng nhập thất bại";
            }
        }
    }
    public function QuanLySanPham(){
        include_once './view/T_quanlysanpham.php';
     }
 
     public function add(){
         
         $alm = new SanPham();
         // if(isset($_REQUEST['id'])){
         //     $alm = $this->MODEL->checkID($_REQUEST['id']);
         // }
 
         include_once './view/T_themsanpham.php';
     }
 
      public function update_Thao(){
         
         $alm = new SanPham();
         $alm = $this->MODEL_SP_THAO->checkID($_REQUEST['id']);
 
         include_once './view/T_suasanpham.php';
      }
 
     public function updateNV(){
         
         $alm = new NhanVien();
         $alm = $this->MODEL_NV_THAO->delete($_REQUEST['id']);
 
         include_once './view/T_quanlynhanvien.php';
     }
     
     public function deleteInvoice(){
         
         $alm = new ct_hoaDon();
         $alm = $this->MODEL_CTHD_THAO->deleteInvoice($_REQUEST['id']);
 
         include_once './view/T_quanlydonhang.php';
     }
 
     public function updateInvoice_admin()
     {
         $thao = new ct_hoaDon();
         $thao = $this->MODEL_CTHD_THAO->updateInvoice($_REQUEST['id']);
 
         include_once './view/T_quanlydonhang.php';
     }
 
      public function checkAdd (){
         $alm = new SanPham();
         $kl = new KhoiLuong();
         $g = new gia(); 
         $count = $this->MODEL_SP_THAO->getID_SP();
         $count+=1;
         if($count > 9)
         {
             $alm->id_sp = 'SP0'.$count;
         }
         else
         {
             $alm->id_sp = 'SP00'.$count;
         }
         $alm->id_loai = $_POST['select'];
         $alm->tensp = $_POST['txt_hoten'];
         mkdir("view/img/$alm->id_loai/$alm->id_sp", 0700);
         $alm->hinhsp = $_FILES['image']['name'];
         if($alm->hinhsp != "")
         {
             move_uploaded_file($_FILES["image"]["tmp_name"], "./view/img/$alm->id_loai/$alm->id_sp/$alm->hinhsp");
         }
         $this->MODEL_SP_THAO->insert($alm);
 
         $donvi = $_POST['btn'];
         $kl->KL = $_POST['txt_khoiluong'];
         $kl->KL = $kl->KL.$donvi;
         $count2 = $this->MODEL_KL_THAO->kiemtraKhoiLuong($kl->KL);
         if($count2 == 0)
         {
             $KL = $this->MODEL_KL_THAO->getID_KL();
             foreach($KL as $thao)
             {
                 $so = $thao['max(ID_KL)'];
                 $so += 1;
                 $kl->id_kl = $so;
             }
             $this->MODEL_KL_THAO->insertKL($kl);  
         }
 
         $hehe =  $this->MODEL_KL_THAO->traveMaKL($kl->KL);
         foreach($hehe as $he)
         {
             $g->id_kl = $he['ID_KL'];
         }
         $g->id_sp = $alm->id_sp;
         $g->soluong = $_POST['txt_sl'];
         $g->gia = $_POST['txt_gia'];
 
         $this->MODEL_GIA_THAO->insertGia($g);
         header("Location: index.php");
  
     }
     public function check_Thao(){
         $alm = new SanPham();
         $kl = new KhoiLuong();
         $g = new gia();
         $alm->id_sp = $_POST['txt_idsp'];
         $alm->id_loai = $_POST['select'];
         $alm->tensp = $_POST['txt_hoten'];
         $alm->hinhsp = $_FILES['image']['name'];
         $kl->KL = $_POST['txt_khoiluong'];
         $hehe =  $this->MODEL_KL_THAO->traveMaKL($kl->KL);
         foreach($hehe as $he)
         {
             $g->id_kl = $he['ID_KL'];
             $g->id_sp = $alm->id_sp;
             $g->soluong = $_POST['txt_sl'];
             $g->gia = $_POST['txt_gia'];
             $this->MODEL_GIA_THAO->update($g);
             echo $g->id_kl;
             echo $g->id_sp;
         }
         if($alm->hinhsp == "")
         {
             $loai = $this->MODEL_SP_THAO->getID_Loai($alm->id_sp);
             foreach($loai as $l)
             {
                 $id_loai = $l['ID_Loai'];
                 if($id_loai != $alm->id_loai)
                 {
                     mkdir("view/img/$alm->id_loai/$alm->id_sp", 0700);
                     $hinh = $this->MODEL_SP_THAO->getHinh($alm->id_sp);
                     foreach($hinh as $h)
                     {
                         $picture = $h['HinhSP'];
                         $org_image="view/img/$id_loai/$alm->id_sp/$picture";
                         $destination="view/img/$alm->id_loai/$alm->id_sp";
                         $img_name=basename($org_image);
                         if(rename( $org_image , $destination.'/'.$img_name ))
                             echo 'moved';
                         else
                             echo 'error';
                     }
                 }
             }
             $this->MODEL_SP_THAO->update_NoImage($alm);
        }
        else
        {
            move_uploaded_file($_FILES["image"]["tmp_name"], "./view/img/$alm->id_loai/$alm->id_sp/$alm->hinhsp");
            $this->MODEL_SP_THAO->update_HaveImage($alm);
        }
        header("Location: index.php");
    }
 
    public function delete(){ 
        $this->MODEL_SP_THAO->delete($_REQUEST['id']);
        header("Location: index.php");
    }
     
    public function qlsp()
    {
        include_once './view/T_quanlysanpham.php';
    }
 
    public function qlkh()
    {
        include_once './view/T_quanlykhachhang.php';
    }
 
    public function qlnv()
    {
        include_once './view/T_quanlynhanvien.php';
    }
 
    public function qldh()
    {
        include_once './view/T_quanlydonhang.php';
    }
    public function DangKy()
    {
        include_once './view/DangKy.php';
    }
    public function DangNhap()
    {
        include_once './view/DangNhap.php';
    }
    public function register()
    {
        $kh = new KhachHang;
        $count = $this->MODEL_KH_THAO->getID_KH();
        $count += 1;
        $kh->Password = $_POST['pass'];
        $password = $_POST['password'];
        $kh->DT = $_POST['address'];
        $kh->tenKH = $_POST['name'];
        if($count > 9)
        {
            $kh->id_kh = 'KH0'.$count;
        }
        else
        {
            $kh->id_kh = 'KH00'.$count;
        }
        $kh->gmail = $_POST['account'];
        $check = $this->MODEL_KH_THAO->checkGmail($kh->gmail);
        if($check == 0)
        {
            if($kh->Password == $password)
            {
                $this->MODEL_KH_THAO->addCustomer($kh);
                header("location: index.php");
            }
        }
        else
        {
            echo 'Trùng email';
        }
    }
    public function lichsumuahang()
    {
        include_once './view/T_lichsumuahang.php';
    }
    public function check_tinhtranghd()
    {
        $this->MODEL_HD_THAO->displayButton2($_REQUEST['id']);
        include_once './view/T_lichsumuahang.php';
    }
    public function tieptucmua()
    {
        include_once './view/Home.php';
    }
}
?>
