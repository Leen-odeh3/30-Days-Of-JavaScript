let nums = [1, 2, 3]
nums[0] = 10
console.log(nums) // [10, 2, 3]

let nums = [1, 2, 3]
let numbers = [1, 2, 3]
console.log(nums == numbers) // false



let numbers = nums
console.log(nums == numbers)  // true

let userOne = {
name:'leen',
country:'palestine'
}
let userTwo = userOne
console.log(userOne == userTwo)  // true