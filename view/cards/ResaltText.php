 <ul class="list">
     <li>Кількість символів в тексті: <?= $calcSymbols ?></li>
     <li>Кількість символів в тексті за методом mb_strlen: <?= $calcSymbols_mb ?></li>
     <li>Кількість речень в тексті: <?= $calcLetters ?></li>
     <li>Кількість слів в тексті: <?= $calcWords ?></li>
     <li>Повторення слів:
         <ol>
             <?php foreach ($listSameWords as $key => $word) : ?>
                 <li>Кількість слів <?= $word ?> в тексті :<?= $key ?> разів.</li>
             <?php endforeach ?>
         </ol>
     </li>
     <li>Повторення літер:
         <ol>
             <?php foreach ($listSameLettes as $letter => $number) : ?>
                 <li>Кількість повторів літери <?= $letter ?> в тексті :<?= $number ?> разів.</li>
             <?php endforeach ?>
         </ol>
     </li>
     <li><?= $palyndromes ?></li>
     <li> Список використаних слів в тексті:
         <table id="wordsBoard">
             <?php
                for ($j = 0; $j < ceil((count($unique_words) / 10)); $j++) {
                    $wordsBoard .= '<tr>';
                    for ($i = 0; $i < 10; $i++) {
                        $h = $j + $i;
                        $number = $unique_words[$h];
                        $wordsBoard .= "<td bgcolor='white' width='20' height='40'>$number</td>";
                    };
                    $wordsBoard .= '</tr>';
                }
                echo ($wordsBoard)
                ?>
         </table>
     </li>
 </ul>
