<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Front\BlogModel;

class Blog extends BaseController
{
    public function __construct()
    {
        $this->BlogModel = new BlogModel();
    }
    public function index()
    {
        $data = array(
            'title' => 'HydroPhicos | Blog',
            'archive' => $this->BlogModel->archive()->getresultarray(),
            'recent' => $this->BlogModel->recent()->getresultarray(),
            'data_blog' => $this->BlogModel->join('admin', 'blog.id_admin = admin.id_admin')->paginate(3),
            'pager'     => $this->BlogModel->join('admin', 'blog.id_admin = admin.id_admin')->pager
        );


        return view('front/pages/blog', $data);
    }
    public function post($slug = "")
    {
        if (empty($slug)) {
            return redirect()->to(base_url() . '/blog');
        }
        $data_blog = $this->BlogModel->join('admin', 'blog.id_admin = admin.id_admin')->getwhere(['slug' => $slug]);

        if (count($data_blog->getresultarray()) < 1) {
            return redirect()->to(base_url() . '/blog');
        }

        $data = array(
            'title' => 'HydroPhicos | Blog',
            'archive' => $this->BlogModel->archive()->getresultarray(),
            'recent' => $this->BlogModel->recent()->getresultarray(),
            'data_blog' => $data_blog->getrowarray(),
        );


        return view('front/pages/blogpost', $data);
    }

    public function archive($bulan, $tahun)
    {
        if ((empty($bulan)) or (empty($tahun))) {
            return redirect()->to(base_url() . '/blog');
        }

        $bulan = date('m', strtotime($bulan));
        $tanggal = $tahun . '-' . $bulan . '-01';

        $data_blog = $this->BlogModel->archive_month($tanggal);
        // $data_blog = $this->BlogModel->join('admin', 'blog.id_admin = admin.id_admin')->where("YEAR(blog.terakhir_diperbarui)", "YEAR('2021-01-07')")->getcompiledselect();

        if (count($data_blog->getresultarray()) < 1) {
            return redirect()->to(base_url() . '/blog');
        }

        $data = array(
            'title' => 'Phicos |Blog',
            'data_blog' => $data_blog->getresultarray(),
            'archive' => $this->BlogModel->archive()->getresultarray(),
            'recent' => $this->BlogModel->recent()->getresultarray(),
            'pager' => ''
        );

        // dd($data['data_blog']);
        return view('front/pages/blog', $data);
    }
}
