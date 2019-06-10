<?php

if (isset($_COOKIE['lang'])) {
    if ($_COOKIE['lang'] == "en")
        $lang = Language::getEnglishPack();
    else if ($_COOKIE['lang'] == "ko")
        $lang = Language::getKoreanPack();
} else
    $lang = Language::getEnglishPack();

class Language
{
    private function __construct()
    {
    }

    public static function getEnglishPack()
    {
        $lang['lang'] = 'en';

        // /auth/login.php
        $lang['logintitle'] = 'PUCOM Login';
        $lang['login'] = 'Login';
        $lang['username'] = 'Username';
        $lang['enterusername'] = 'Please Enter Username';
        $lang['password'] = 'Password';
        $lang['enterpassword'] = 'Please Enter Password';
        $lang['donthaveaccount'] = "Don't have an account?";
        $lang['register'] = 'Register';


        // /auth/register.php
        $lang['registertitle'] = 'PUCOM Register';
        $lang['passwordconfirm'] = 'Confirm Password';
        $lang['passwordconfirmtitle'] = 'Please Enter Your Password Again';
        $lang['passval'] = 'Password Doesn\'t Match';
        $lang['name'] = 'Name';
        $lang['nametitle'] = 'Please Enter Your Name';
        $lang['email'] = 'Email Address';
        $lang['emailtitle'] = 'Please Enter a Valid Mail';
        $lang['phone'] = 'Phone';
        $lang['postcode'] = 'Postcode';
        $lang['address'] = 'Address';
        $lang['detailaddress'] = 'Detail Address';

        return $lang;
    }

    public static function getKoreanPack()
    {
        $lang['lang'] = 'ko';

        // /auth/login.php
        $lang['logintitle'] = 'PUCOM 로그인';
        $lang['login'] = '로그인';
        $lang['username'] = '아이디';
        $lang['enterusername'] = '아이디를 입력해주세요';
        $lang['password'] = '비밀번호';
        $lang['enterpassword'] = '비밀번호를 입력해주세요';
        $lang['donthaveaccount'] = "계정이 없으신가요?";
        $lang['register'] = '회원가입';


        // /auth/register.php
        $lang['registertitle'] = 'PUCOM 회원가입';
        $lang['passwordconfirm'] = '비밀번호 확인';
        $lang['passwordconfirmtitle'] = '비밀번호를 한 번 더 입력해주세요';
        $lang['passval'] = '비밀번호가 일치하지 않습니다';
        $lang['name'] = '성명';
        $lang['nametitle'] = '성명을 입력하세요';
        $lang['email'] = '이메일 주소';
        $lang['emailtitle'] = '이메일 주소를 입력해주세요';
        $lang['phone'] = '전화번호';
        $lang['postcode'] = '우편번호';
        $lang['address'] = '주소';
        $lang['detailaddress'] = '상세주소';

        return $lang;
    }
}