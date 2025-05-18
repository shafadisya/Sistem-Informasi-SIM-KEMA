@extends('template.template-user')
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #ffffff;
    }

    /* Sidebar */
    .sidebar {
        width: 270px;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        background-color: #c8e0ef;
        padding-top: 20px;
    }

    .sidebar-logo {
        text-align: left;
        padding: 10px 20px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
    }

    .sidebar-logo img {
        width: 50px;
        margin-right: 10px;
    }

    .sidebar-logo span {
        font-family: "Times New Roman", serif;
        font-style: italic;
        font-size: 24px;
        font-weight: bold;
        color: #29447c;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
    }

    .sidebar-menu li a {
        display: flex;
        align-items: center;
        color: #29447c;
        padding: 15px 20px;
        text-decoration: none;
        transition: 0.3s;
    }

    .sidebar-menu li a:hover,
    .sidebar-menu li a.active {
        background-color: #b9d9ee;
    }

    .sidebar-menu li a i {
        margin-right: 10px;
        font-size: 18px;
        color: #3498db;
    }

    /* Main content */
    .content-wrapper {
        margin-left: 270px;
        padding: 40px;
    }

    .title {
        text-align: center;
        font-size: 30px;
        color: #29447c;
        font-family: "Times New Roman", serif;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .certificate-box {
        background-color: #d7ebf7;
        border-radius: 20px;
        padding: 30px;
        max-width: 700px;
        margin: 0 auto;
        text-align: center;
    }

    .certificate-box p {
        font-size: 16px;
        color: #29447c;
        font-weight: bold;
        margin-bottom: 15px;
        font-style: italic;
    }

    .certificate-link {
        display: inline-block;
        background-color: #ffffff;
        border: 1px solid #ccc;
        padding: 12px 20px;
        border-radius: 10px;
        color: #777;
        font-size: 15px;
        font-style: italic;
    }

    .certificate-link a {
        color: #007bff;
        text-decoration: none;
    }

    .certificate-link a:hover {
        text-decoration: underline;
    }
</style>

<div class="content-wrapper">
    <div class="title">Sertifikat Panitia</div>
    <div class="certificate-box">
        <p>Anda dapat mengunduh sertifikat Anda melalui link berikut ini:</p>
        <div class="certificate-link">
            <!-- Ganti dengan link dinamis jika diperlukan -->
            <a href="https://drive.google.com/file/d/1AbCDEFghijklmnopQRstuVWxyz/view?usp=sharing" target="_blank">
                Unduh Sertifikat Panitia
            </a>

        </div>
    </div>
</div>
