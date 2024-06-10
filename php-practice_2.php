<?php
// Q1 tic-tac問題
##条件の順番に注意！
##最初のif文で「４の倍数はticと出力する」と書いてしまうと、
##前に実行された別の処理で止まるため、
##20や100がtic-tacと出力されなくなる。
for($i = 1; $i <= 100; $i++) {
  if ($i % 4 == 0 && $i % 5 == 0) {
      echo "tic-tac \n";
  } elseif ($i % 4 == 0) {
      echo "tic \n";
  } elseif ($i % 5 == 0) {
      echo "tac \n";
  } else {
      echo "$i \n";
  }
}

// Q2 多次元連想配列
$personalInfos = [
  [
      'name' => 'Aさん',
      'mail' => 'aaa@mail.com',
      'tel'  => '09011112222'
  ],
  [
      'name' => 'Bさん',
      'mail' => 'bbb@mail.com',
      'tel'  => '08033334444'
  ],
  [
      'name' => 'Cさん',
      'mail' => 'ccc@mail.com',
      'tel'  => '09055556666'
  ],
];

##問題1
##角括弧を連続して書くことで「要素番号[0]の、['name']の情報を取ってきて」と指定できる
echo $personalInfos[1]['name'] . 'の電話番号は' . $personalInfos[1]['tel'] . 'です。';

##問題2
##$keyで要素番号が出るので（なぜ？）+1して１番スタートにした
foreach($personalInfos as $key => $info) {
    echo $key+1 . "番目の" . $info['name'] . "のメールアドレスは" . $info['mail'] . "で、電話番号は" . $info['tel'] . "です。\n";
};

##問題3
##変数['キー名'] = バリュー;の書き方で要素を追加できる
## → $personalInfosの要素ごとにageキーを追加
##($personalInfos[$key]['age']の、[$key]を抜かして書くと、$personalInfosにキーを追加することになってしまう！！)
## → $ageListの値を要素番号ごとに振り分ける
##$keyが要素番号を持っている（なぜ？）のでそれを活用した
$ageList = [25, 30, 18];

foreach($personalInfos as $key => $info) {
    $personalInfos[$key]['age'] = $ageList[$key];
};
var_dump($personalInfos);

// Q3 オブジェクト-1
##山田の変数を作り、インスタンス化したクラスを代入。引数に学籍番号と名前を渡す
## → 出力する時は $yamada->studentId; と書く
## → $idに引数の120が渡され、コンストラクタの効果で引数の値がプロパティ（クラス内の変数＝$studentId）にセットされる
## → echo $yamada->studentId; で学籍番号が出てくる
class Student
{
    public $studentId;
    public $studentName;

    public function __construct($id, $name)
    {
        $this->studentId = $id;
        $this->studentName = $name;
    }

    public function attend($data)
    {
        echo $this->studentName . 'は' . $data . 'の授業に参加しました。学籍番号：' . $this->studentId;
    }
}

$yamada = new Student(120, '山田');
echo '学籍番号' . $yamada->studentId . '番の生徒は' . $yamada->studentName . 'です。';

// Q4 オブジェクト-2
##関数attendのスコープ外の変数を使うのは無理。
##$this->○○○○を使って、渡している引数を持ってくることでなんとか解決。
##$thisに入る変数は、その時動かしてる変数が入るので、今は$yamadaが入る。
$yamada->attend('PHP');


// Q5 定義済みクラス
##問題1
##インスタンス化したDateTimeクラスに、プロパティ$timeを作って今の時間を取得
## → modifyメソッドで日付に加算・減算できるので、１か月前に指定する
##フォーマットはYYYY-mm-dd
$time = new DateTime();
$time->setTimezone(new DateTImeZone('Asia/Tokyo'));
echo $time->modify('-1 months')->format('Y-m-d');

##問題2
##日付の計算をすることは明白なので、見やすくするため$time2を定義
## → #diffは２つの時刻の差を返すメソッド。アロー演算子（->）でアクセスできる。
## → $time->diff($time2);には、y・m・d・daysなどのプロパティが含まれている。
## → アロー演算子でdaysプロパティにアクセスして経過日数を取得している
$time2 = new DateTime('1992-04-25');
$interval = $time->diff($time2);
echo 'あの日から' . $interval->days . '日経過しました。';

?>