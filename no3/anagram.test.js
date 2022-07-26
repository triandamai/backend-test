const anagram = require('./anagram')

const text = "kelompokkan/group ['kita', 'atik', 'tika', 'aku', 'kia', 'makan', 'kua'] di dalamnya sesuai dengan kelompok Anagramnya"
test(text, () => {
    expect(anagram).toBe(JSON.stringify([
        ["kita", "atik", "tika"],
        ["aku", "kua"],
        ["kia"],
        ["makan"]
    ]))
})
