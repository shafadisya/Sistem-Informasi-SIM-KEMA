@extends('template.template_user') 

@section('content')
<style>
    .content-wrapper {
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
            <a href="https://drive.google.com/file/d/1AbCDEFghijklmnopQRstuVWxyz/view?usp=sharing" target="_blank">
                Unduh Sertifikat Panitia
            </a>
        </div>
    </div>
</div>
@endsection
