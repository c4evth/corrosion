/**
 * 路由工具
 * author iimT
 */

let router = {}
let that   = this

router.push = to => {
  this.location.href = "/admin" + to
}

router.replace = to => {
  this.location.replace(to)
}
router.go = step => {
  this.history.go(step)
}

this.router = router