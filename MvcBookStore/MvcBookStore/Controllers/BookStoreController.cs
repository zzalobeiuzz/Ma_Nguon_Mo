using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using MvcBookStore.Models;

using PagedList;
using PagedList.Mvc;
namespace MvcBookStore.Controllers
{
    public class BookStoreController : Controller
    {
        //Tạo 1 đối tượng chứa toàn bộ CSDL từ dbQLBansach
        dbQLBansachDataContext data = new dbQLBansachDataContext();

        private List<SACH> Laysachmoi(int count)
        {
            //Sắp xếp giảm dần theo Ngaycapphat, lay count dong dau
            return data.SACHes.OrderByDescending(a => a.Ngaycapnhat).Take(count).ToList();
        }
        // GET: BookStore
        public ActionResult Index(int ? page)
        {
            //Tao bien quy dinh so san pham tren moi trang
            int pageSize=5;
            // Tao bien so trang
            int pageNum = (page ?? 1);
            //Lấy top 5 Album bán chạy nhất
            var sachmoi = Laysachmoi(5);
            return View(sachmoi.ToPagedList(pageNum, pageSize));

        }
        public ActionResult Chude()
        {
            var chude = from cd in data.CHUDEs select cd;
            return PartialView(chude);
        }
        public ActionResult Nhaxuatban()
        {
            var nhaxuatban = from nxb in data.NHAXUATBANs select nxb;
            return PartialView(nhaxuatban);
        }
        public ActionResult SPTheochude(int id)
        {
            var sach = from s in data.SACHes where s.MaCD == id select s;
            return View(sach);
        }
        public ActionResult SPTheoNXB(int id)
        {
            var sach = from s in data.SACHes where s.MaNXB == id select s;
            return View(sach);
        }
        public ActionResult Details(int id)
        {
            var sach = from s in data.SACHes where s.Masach == id select s;
            return View(sach.Single());
        }
    }
}