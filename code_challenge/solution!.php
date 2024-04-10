/**
 * Given a string S return a reversed string where all characters that are not letter
 *  stay in the same position and all letters reverse position.
 * 
 * Example1:
 * Input: "ab-cd"
 * Output: "dc-ba"
 * 
 * Example2:
 * Input: "a-bC-dEt=ghIj!!"
 * Output: "j-Ih-gtE=dCba!!"
 */


// function reverseOnlyLetter(S){
//     let result = '';

//     let l = S.split('');

//     let onlyLetters = S.replace(/[^a-zA-Z]/g, '');
//     let ol = onlyLetters.split('').sort();

//     let si = 0;

//     for (i = 0; i < l.lenght; i++) {
//         let isChar = (l[i].toString().match(/^a-zA-Z/) ? true : false);

            
//         if (isChar) {
//             result += ol[si];
//             si++;
//         } else {
//             result += l[i];
//         }
//     }

//     return result;

// }

<?php

function reverseOnlyLetter($S) {
    $result = '';

    // Split the string into an array of characters
    $l = str_split($S);

    // Extract only the letters from the string and sort them
    preg_match_all('/[a-zA-Z]/', $S, $matches);
    $onlyLetters = implode('', $matches[0]);
    $ol = str_split($onlyLetters);
    rsort($ol);

    $si = 0;

    // Iterate through each character in the original string
    foreach ($l as $char) {
        // Check if the character is a letter
        $isChar = preg_match('/[a-zA-Z]/', $char);

        if ($isChar) {
            // Append the sorted letter from $ol array
            $result .= $ol[$si];
            $si++;
        } else {
            // Append non-letter characters as they are
            $result .= $char;
        }
    }

    return $result;
}

// Test the function with examples
echo reverseOnlyLetter("ab-cd") . "\n"; // Output: "dc-ba"
echo reverseOnlyLetter("a-bC-dEt=ghIj!!") . "\n"; // Output: "j-Ih-gtE=dCba!!"

