<?php
class Pager
{
    function findStart($limit)
    {
        if((!isset($_GET['page'])) || ($_GET['page']=="1"))
        {
            $start = 0;
            $_GET['page'] = 1;
        }
        else
        {
            $start = ($_GET['page'] - 1) * $limit;
        }
        return $start;
    }
    function findPages($count, $limit)
    {
        $pages = (($count%$limit)==0) ? $count/$limit:floor($count/$limit) + 1;
        return $pages;
    }
    function pageList($curPage, $pages, $param = NULL)
    {
        $ma_khoa_hoc = "Khoa lap trinh PHP";
        $page_list = "";
        if(($curPage != 1) && ($curPage))
        {
            $page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?h=SanPham&"."page=1$param\" tiltle=\"Trang dau\">First |</a>";
        }
        if(($curPage - 1) > 0)
        {
            $page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?h=SanPham&"."page=".($curPage-1)."$param\" tiltle=\"Ve trang truoc\">Previous |</a>";
        }
        $vtdau = max($curPage-2,1);
        $vtcuoi = min($curPage+2,$pages);

        for($i=$vtdau;$i<=$vtcuoi;$i++)
        {
            if($i == $curPage)
            {
                $page_list .= "<span>".$i."</span>";
            }
            else
            {
                $page_list .= "<a href='".$_SERVER['PHP_SELF']."?h=SanPham&"."page=".$i."$param 'title = 'Trang ".$i."'>".$i."</a>";
            }
        }
        if($curPage + 1 <= $pages)
        {
            $page_list .= "<a href =\"".$_SERVER['PHP_SELF']."?h=SanPham&"."page=".($curPage + 1)."$param\" title=\"Den trang sau\"> |Next </a>";
            $page_list .= "<a href =\"".$_SERVER['PHP_SELF']."?h=SanPham&"."page=".$pages."$param\" title=\"Den trang cuoi\"> | Last</a>";
        }
        return $page_list;
    }
    function nextPrev($curPage, $pages) //Hien thi hai nut truoc sau
    {
        $next_prev ="";
        if($curPage - 1 < 0)
        {
            $next_prev .= "Ve trang truoc";
        }
        else
        {
            $next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?h=SanPham&page=".($curPage-1)."\"> Ve trang truoc </a>";
        }
        $next_prev .= " | ";
        if(($curPage + 1) > $pages)
        {
            $next_prev .= "Den trang sau";
        }
        else
        {
            $next_prev = "<a href=\"".$_SERVER['PHP_SELF']."?h=SanPham&page=".($curPage+1)."\">Den trang sau</a>";
        }
        return $next_prev;
    }
}
?>