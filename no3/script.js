function cekApakahAnagram(string1, string2) {
    let word1 = string1.length; // simpan panjang string pertama
    let word2 = string2.length; // panjang string kedua

    // cek apakah string1 dan string2 itu sama panjang
    if(word1 !== word2){
        return console.log('panjang huruf tidak sama');
    }

    // jadikan ke array string,
    // urutkan hurufnya
    // lalu gabungkan semua elemen array
    let str1 = string1.split('').sort().join('');
    let str2 = string2.split('').sort().join('');

    if(str1 === str2){
       console.log("Anagram");
    } else { 
       console.log("Bukan anagram");
    }
 }