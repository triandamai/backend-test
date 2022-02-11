# backend-test
Soal Test backend developer
## 1. Simple database Querying

Terdapat sebuah table "USER" yg memiliki 3 kolom: ID, UserName, Parent. Di mana:
Kolom ID adalah Primary Key
Kolom UserName adalah Nama User
Kolom Parent adalah ID dari User yang menjadi Creator untuk User tertentu.

|ID|UserName|Parent|
|----|----|----|
|1|Ali|2|
|2|Budi|0|
|3|Cecep|1|

Tulisakan SQL QUERY untuk mendapatkan data berisi:
|ID|UserName|ParentUserName|
|----|----|----|
|1|Ali|Budi|
|2|Budi|NULL|
|3|Cecep|Ali|

* Kolom ParentUserName adalah UserName berdasarkan value Parent

## 2. Buat sebuah Service untuk menampilkan dan menyimpan data medicaal record

Service dapat menggunakan protocol REST JSON HTTP

Fungsi yang perlu diimplementasi:
- GET dengan pagination 
- GET detail medical record berdasarkan id
- POST menyimpan data medical record

Contoh Data Medical Record:
```json
    [
        {
            "id": "2337",
            "member_id": "CXPq9AD0XZoOO",
            "nurse_id": "CXPq9AD0XZoRR",
            "type": "TEMPERATURE",
            "value": "35.66",
            "method": "MANUAL",
            "diagnosis": "diagnosis",
            "note": "ini adalah note",
            "mime_type": "text",
            "created_at": 1643881135000,
            "updated_at": 1643881135000
        },
         {
            "id": "2338",
            "member_id": "CXPq9AD0XZoOO",
            "nurse_id": "CXPq9AD0XZoRR",
            "type": "BLOODPRESSURE",
            "value": {
                "systole":"",
                "disatole":""
            },
            "method": "MANUAL",
            "diagnosis": "diagnosis",
            "note": "ini adalah note",
            "mime_type": "text",
            "created_at": 1643881135000,
            "updated_at": 1643881135000
        },
        {
            "id": "2339",
            "member_id": "CXPq9AD0XZoOO",
            "nurse_id": "CXPq9AD0XZoRR",
            "type": "SLEEP",
            "value": {
                "sleepStart":1643881135000,
                "sleepEnd":1643881135000,
                "deepSleep":455,
                "lightSleep":397,
                "wakeTime":2
            },
            "method": "MANUAL",
            "diagnosis": "diagnosis",
            "note": "ini adalah note",
            "mime_type": "text",
            "created_at": 1643881135000,
            "updated_at": 1643881135000
        }
    ]
```

Aspek penting:
- Readability Code
- Good display on knowledge of "Separation Of Concerns for Codes"

Nilai plus:
- Mengimplementasikan Clean Architecture
- Mengimplementasikan Unit test

## 3. Logic Test
Anagram adalah istilah dimana suatu string jika dibolak balik ordernya maka akan sama eg. 'aku' dan 
'kua' adalah Anagram, 'aku' dan 'aka' bukan Anagram.
Dibawah ini ada array berisi sederetan Strings.
```javascript 
['kita', 'atik', 'tika', 'aku', 'kia', 'makan', 'kua']
```
Silahkan kelompokkan/group kata-kata di dalamnya sesuai dengan kelompok Anagramnya,

Expected result:
```javascript
[
    ["kita","atik","tika"],
    ["aku","kua"],
    ["makan"],
    ["kia"]
]
```
## Instruksi Pengerjaan
- Fork repo ini ke github masing-masing kemudian clone dan mulai anda sudah dapat mulai mengerjakan
- Kerjakan Soal test dan simpan hasilnya di folder baru berisi source code dan jawaban
- Untuk mengumpulkan hasilnya silahkan lakukan pull request