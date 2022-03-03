let myArr = ['kita', 'atik', 'tika', 'aku', 'kia', 'makan', 'kua']

function solution(newArr) {
    let answer = []

    for (let i = 0; i < newArr.length; i++) {
        if (newArr[i] != null) {
            answer.push([newArr[i]])
            let sortWord1 = newArr[i].split('').sort().join('')
            for (let j = i + 1; j < newArr.length; j++) {
                if (newArr[j] != null) {
                    let sortWord2 = newArr[j].split('').sort().join('')
                    if(sortWord1==sortWord2){
                        answer[answer.length-1].push(newArr[j])
                        newArr.splice(j,1,null)
                    }
                }
            }
            newArr.splice(i,1,null)
        }
    }
    
    answer.sort((a,b)=>{
        if (b.length==a.length){
            return b[0].length - a[0].length
        } else{
            return b.length - a.length
        }
        
    })

return answer

}

console.log(solution(myArr))