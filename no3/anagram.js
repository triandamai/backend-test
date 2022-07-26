let checkAnagram = (word1, word2) => word1.split('').sort().join('') == word2.split('').sort().join('')

let groupAnagram = words => {
    let result = []
    for (let i = 0; i < words.length; i++) {
        if (result.length == 0) result.push([words[i]])
        else {
            for (let j = 0; j < result.length; j++) {
                if (checkAnagram(result[j][0], words[i])) {
                    result[j].push(words[i])
                    break
                }
                if (j == (result.length - 1)) {
                    result.push([words[i]])
                    break
                }
            }
        }
    }
    return result
}

let words = ['kita', 'atik', 'tika', 'aku', 'kia', 'makan', 'kua']

module.exports = JSON.stringify(groupAnagram(words))