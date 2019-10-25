<?php
class Captcha
{
    protected $width;
    protected $height;
    protected $res;
    protected $len;
    protected $code;
    public function __construct(int $width = 100, $height = 30, int $len = 5)
    {
        $this->width = $width;
        $this->height = $height;
        $this->len = $len;
    }
    public function render()
    {
        $res = imagecreatetruecolor($this->width, $this->height);
        imagefill($this->res = $res, 0, 0, imagecolorallocate($res, 200, 200, 200));
        $this->pix();
        $this->line();
        $this->text();
        $this->show();
        return $this->code;
    }
    //显示渲染
    protected function show()
    {
        header("Content-type:image/png");
        imagepng($this->res);
    }
    //生成验证码
    protected function text()
    {
        $font = realpath('simkai.ttf');
        $text = 'asdfghjkqwertyuiopxcvbnm345467890';
        for ($i = 0; $i < $this->len; $i++) {
            $x = $this->width / $this->len;
            $angle = mt_rand(-20, 20);
            $box = imagettfbbox(20, $angle, $font, 'a');
            $this->code .= $code = strtoupper($text[mt_rand(0, strlen($text) - 1)]);
            imagettftext(
                $this->res,
                20,
                $angle,
                $x * $i + 10,
                $this->height / 2 - ($box[7] - $box[0]) / 2,
                $this->textColor(),
                $font,
                $code
            );
        }
    }
    //生成随机线条
    protected function line()
    {
        for ($i = 0; $i < 6; $i++) {
            imagesetthickness($this->res, mt_rand(1, 3));
            imageline(
                $this->res,
                mt_rand(0, $this->width),
                mt_rand(0, $this->height),
                mt_rand(0, $this->width),
                mt_rand(0, $this->height),
                $this->color()
            );
        }
    }
    //生成干扰点
    protected function pix()
    {
        for ($i = 0; $i < 300; $i++) {
            imagesetpixel(
                $this->res,
                mt_rand(0, $this->width),
                mt_rand(0, $this->height),
                $this->color()
            );
        }
    }
    //生成随机颜色
    protected function color()
    {
        return imagecolorallocate(
            $this->res,
            mt_rand(0, 255),
            mt_rand(0, 255),
            mt_rand(0, 255)
        );
    }
    //随机生成文字颜色
    protected function textColor()
    {
        return imagecolorallocate(
            $this->res,
            mt_rand(0, 100),
            mt_rand(0, 100),
            mt_rand(0, 100)
        );
    }
}
