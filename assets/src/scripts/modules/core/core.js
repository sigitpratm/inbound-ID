let Core = {
	tester: () => {
		let menuClass = $('.tester')
		let transEnter = 'transition ease-out duration-200'
		let transEnterStart = 'opacity-0 translate-y-1'
		let transEnterEnd =  "opacity-100 translate-y-0"
		let transLeave = "transition ease-in duration-150"
		let transLeaveStart = "opacity-100 translate-y-0"
		let transLeaveEnd = "opacity-0 translate-y-1"
		let btn1 = $('#menu-1')
		let isVisible = document.querySelector(".tester").style.display === "block";
		let isHidden = document.querySelector(".tester").style.display === "none";
		btn1.on('click', () => {

			if (isHidden) {
				menuClass.show()
				menuClass.addClass(transEnter)
				if (menuClass.hasClass(transEnter)) {
					menuClass.addClass(transEnterStart)
					menuClass.removeClass(transEnter)

					if (menuClass.hasClass(transEnterStart)) {
						menuClass.addClass(transEnterEnd)
						menuClass.removeClass(transEnterStart)
						menuClass.removeClass(transEnterEnd)
					}
				}
			} else {
				menuClass.hide()
				// menuClass.addClass(transLeave)
				// if (menuClass.hasClass(transLeave)) {
				// 	menuClass.addClass(transLeaveStart)
				// 	if (menuClass.hasClass(transLeaveStart)) {
				// 		menuClass.removeClass(transLeaveStart)
				// 		menuClass.addClass(transLeaveEnd)
				// 	}
				// }
			}

			// menuClass.removeClass(transEnter)
			// menuClass.removeClass(transEnterStart)
			// menuClass.removeClass(transEnterEnd)
		})


	}
}

export default Core
