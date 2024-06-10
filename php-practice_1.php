<?php
// Q1 変数と文字列
$name = '塚越';
echo '私の名前は「' . $name . '」です。';

// Q2 四則演算
$sum = 5 * 4;
echo "$sum \n";
echo $sum / 2;

// Q3 日付操作
date_default_timezone_set('Asia/Tokyo');
echo date("現在時刻は、Y年m月d日 H時i分s秒です。");

// Q4 条件分岐-1 if文
$device = 'mac';
if ($device === 'windows' || $device == 'mac') {
  echo '使用OSは、' . $device . 'です。';
} else {
  echo 'どちらでもありません。';
}

// Q5 条件分岐-2 三項演算子
$age = 17;
$message = ($age > 18) ? '成人です。' : '未成年です。';
echo $message;

// Q6 配列
$area = ['東京都', '神奈川県', '茨城県', '栃木県', '千葉県', '埼玉県', '群馬県'];
echo $area[3] . 'と' . $area[4] . 'は関東地方の都道府県です。';

// Q7 連想配列-1
$array = ['東京都' => '新宿区',
          '神奈川県' => '横浜市',
          '千葉県' => '千葉市',
          '埼玉県' => 'さいたま市',
          '栃木県' => '宇都宮市',
          '群馬県' => '前橋市',
          '茨城県' => '水戸市',];
foreach ($array as $pref => $city) {
  echo "$city \n";
}

// Q8 連想配列-2
foreach ($array as $pref => $city) {
  if ($pref === '埼玉県') {
    echo $pref . 'の県庁所在地は、' . $city . 'です。';
  }
}

// Q9 連想配列-3
$array['大阪府'] = '大阪市';
$array['愛知県'] = '名古屋市';

foreach ($array as $pref => $city) {
  if (in_array($pref, $area)){
    echo $pref . "の県庁所在地は、" . $city . "です。\n";
  } else {
    echo $pref . "は関東地方ではありません。\n";
  }
}

// Q10 関数-1
function hello($name)
{
  echo $name . "さん、こんにちは。\n";
}

hello('山田');
hello('佐藤');

// Q11 関数-2
function calcTaxInPrice($price) {
  return $price * 1.1;
}

$price = 1980;
$taxInPrice = calcTaxInPrice($price);
echo $price . '円の商品の税込み価格は' . $taxInPrice . '円です。';

// Q12 関数とif文
function distinguishNum($checkNum) {
  if ($checkNum % 2 === 0) {
    echo $checkNum . 'は偶数です。';
  } else {
    echo $checkNum . 'は奇数です。';
  }
}

distinguishNum(24);
distinguishNum(13);

// Q13 関数とswitch文
function evaluateGrade($evaluate) {
  switch ($evaluate) {
    case 'A':
    case 'B':
      echo '合格です。';
      break;

    case 'C':
      echo '合格ですが追加課題があります。';
      break;

    case 'D':
      echo '不合格です。';
      break;

    default:
      echo '判定不明です。講師に問い合わせてください。';
      break;
  }
}
evaluateGrade('C');
evaluateGrade('q');


?>