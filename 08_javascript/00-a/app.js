const account = {
  name: 'Mehdi',
  outgo: [],
  income: [],
  addOutGo: function (type, value) {
    this.outgo.push(
      {
        'type': type,
        'value': value,
      }
    )
  },
  addIncome: function (type, value) {
    this.income.push(
      {
        'type': type,
        'value': value,
      }
    )
  },
  getAccountSummary: function (){
    let outGoSummary = 0
    let incomeSummary = 0
    this.income.forEach(function (item, index) {
      incomeSummary += item.value
    })
    this.outgo.forEach(function (item, index) {
      outGoSummary += item.value
    })
    return incomeSummary - outGoSummary
  }
}

account.addOutGo('cafe', 60)
account.addOutGo('book', 50)
account.addIncome('job', 100)
account.addIncome('job', 200)


console.log(`The summary of account is: ${account.getAccountSummary()}`)

// let addOutGo = function (type, value){
//   let newOutGo = [
//     {
//       'type': type,
//       'value': value,
//     }
//   ]
//   account.outgo.push()
// }

