<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awps
 */

?>

</div><!-- #content -->
</main><!-- #content -->

<footer class="bg-scheme-green relative z-30 relative ">
	<div class="flex md:flex-row flex-col items-center justify-between w-full max-w-[1360px] mx-auto py-16 text-white md:text-base xl:text-lg gap-16 xl:gap-0 px-4 xl:px-0">

		<div class="w-full space-y-4 md:text-left text-center">
			<a href="">
				<p class="font-bold text-4xl xl:text-5xl">INBOUNDID</p>
			</a>
			<p class="w-full xl:w-2/3">
				<?= emk_options( 'address-footer' ) ?>
			</p>
		</div>

		<div class="w-full text-center ">
			<p> <?= emk_options( 'phone-footer' ) ?> </p>
			<p> <?= emk_options( 'email-footer' ) ?> </p>
		</div>

		<div class="w-full space-y-4">
			<p class="font-bold text-2xl md:text-4xl text-center"><?= emk_options( 'footer-social-title' ) ?></p>
			<div class="flex items-center justify-center gap-8">
				<a href="<?= emk_options( 'footer-social-instagram' ) ?>" target="_blank">
					<img src="<?php echo jpp_assets( 'img/png/icIg.png' ) ?>" alt=""
						 class="icon-footer h-6 xl:h-6 2xl:h-8 transition duration-300 hover:scale-75 hover:opacity-20">
				</a>

				<a href="<?= emk_options( 'footer-social-twitter' ) ?>" target="_blank">
					<img src="<?php echo jpp_assets( 'img/png/icTw.png' ) ?>" alt=""
						 class="icon-footer h-6 xl:h-6 2xl:h-8 transition duration-300 hover:scale-75 hover:opacity-20">
				</a>

				<a href="<?= emk_options( 'footer-social-facebook' ) ?>" target="_blank">
					<img src="<?php echo jpp_assets( 'img/png/icFb.png' ) ?>" alt=""
						 class="icon-footer h-6 xl:h-6 2xl:h-8 transition duration-300 hover:scale-75 hover:opacity-20">
				</a>

				<a href="<?= emk_options( 'footer-social-linkedin' ) ?>" target="_blank">
					<img src="<?php echo jpp_assets( 'img/png/icLinked.png' ) ?>" alt=""
						 class="icon-footer h-6 xl:h-6 2xl:h-8 transition duration-300 hover:scale-75 hover:opacity-20">
				</a>

				<a href="<?= emk_options( 'footer-social-youtube' ) ?>" target="_blank">
					<img src="<?php echo jpp_assets( 'img/png/icYt.png' ) ?>" alt=""
						 class="icon-footer h-6 xl:h-6 2xl:h-8 transition duration-300 hover:scale-75 hover:opacity-20">
				</a>
			</div>
		</div>
	</div>

	<div class="py-16 bg-[#474646] flex items-center justify-center">
		<p class="text-center text-white"><?= emk_options( 'copyright-footer' ) ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
<script>
	function openTabArticle(evt, tabName) {
		let i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("content-tab-order");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tab-order-links");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace("active-menu-order", "");
		}
		document.getElementById(tabName).style.display = "block";
		evt.currentTarget.className += " active-menu-order";
	}
</script>

<script>
	/**
	 * SMALL MENU
	 */
	let btnBurger = document.getElementById("btn-burger")
	btnBurger.addEventListener("click", function () {
		let element = document.getElementById("small-nav");
		element.classList.toggle("small-nav-active");
	})


	let header = document.getElementById("item-nav");
	let btns = header.getElementsByClassName("btn-nav-sm");

	for (let i = 0; i < btns.length; i++) {
		btns[i].addEventListener("click", function () {
			let current = document.getElementsByClassName("active-nav");
			current[0].className = current[0].className.replace(" active-nav", "");
			this.className += " active-nav";
		});
	}


	/**
	 * CHANGE CONTENT SLIDES
	 */
	function jpSlider(btnSlides, firstSlide, activeClassBtn) {
		let indicatorSlider = document.querySelectorAll(btnSlides)

		if (indicatorSlider !== null) {

			for (let i = 0; i < indicatorSlider.length; i++) {
				let firstSlider = document.querySelector(firstSlide)
				indicatorSlider[i].addEventListener("click", function () {
					if (i === 0) {
						firstSlider.style.marginLeft = "0%"
					} else if (i === 1) {
						firstSlider.style.marginLeft = "-100%"
					} else if (i === 2) {
						firstSlider.style.marginLeft = "-200%"
					} else if (i === 3) {
						firstSlider.style.marginLeft = "-300%"
					} else if (i === 4) {
						firstSlider.style.marginLeft = "-400%"
					}
				})
			}

			for (let i = 0; i < indicatorSlider.length; i++) {
				indicatorSlider[i].addEventListener("click", function () {
					indicatorSlider.forEach(btn => {
						btn.classList.remove(activeClassBtn)
					})

					indicatorSlider[i].classList.add(activeClassBtn)
				})
			}
		}

	}


	jpSlider(".btn-slider-hero", ".first-slider-hero", "active-btn-hero")
	jpSlider(".btn-slider-client", ".first-slider-client", "active-btn-client")
	jpSlider(".btn-slider-milestone", ".first-slider-milestone", "active-btn-milestone")
	jpSlider(".btn-slider-inbound-blog", ".first-slider-inbound-blog", "active-btn-inbound-blog")
	jpSlider(".btn-slider-case-studies", ".first-slider-case-studies", "active-btn-case-studies")

</script>

<script>
	let slides = document.getElementsByClassName("slide-work");
	let navLinks = document.getElementsByClassName("link-slide-work");
	let currentSlide = 0;

	let prevSlideWork = document.getElementById("prev-slide-work")
	if (prevSlideWork !== null) {
		prevSlideWork.addEventListener("click", () => {
			changeSlide(currentSlide - 1)
		});
	}

	let nexSlideWork = document.getElementById("next-slide-work")
	if (nexSlideWork !== null) {
		nexSlideWork.addEventListener("click", () => {
			changeSlide(currentSlide + 1)
		});
	}

	function changeSlide(moveTo) {
		if (moveTo >= slides.length) {
			moveTo = 0;
		}
		if (moveTo < 0) {
			moveTo = slides.length - 1;
		}

		slides[currentSlide].classList.toggle("slide-work-active");
		navLinks[currentSlide].classList.toggle("slide-nav-active");
		slides[moveTo].classList.toggle("slide-work-active");
		navLinks[moveTo].classList.toggle("slide-nav-active");

		currentSlide = moveTo;
	}
</script>

<script>
	function openTabOrder(evt, tabName) {
		let i, tabcontent;
		tabcontent = document.getElementsByClassName("content-tab-service");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		document.getElementById(tabName).style.display = "block";
	}

	let linkService = document.querySelectorAll(`.button-indicator`);
	let tabService = document.querySelectorAll(`.content-tab-service`);
	for (let i = 0; i < linkService.length; i++) {
		let iTab = tabService[i].getAttribute('data-tab')
		linkService[i].addEventListener("click", function () {
			openTabOrder("click", iTab)
		})
	}


	function dynamicClass(grupBtn, dynamicClass) {
		let buttons = document.querySelectorAll(grupBtn);
		buttons.forEach(button => {
			button.addEventListener('click', function () {
				buttons.forEach(btn => btn.classList.remove(dynamicClass));
				this.classList.add(dynamicClass);
			});
		});
	}

	dynamicClass('.button-indicator', 'active-btn-service')

	let navLinksService = document.querySelectorAll('.button-indicator')
	for (let i = 0; i < navLinksService.length; i++) {
		navLinksService[i].addEventListener("click", function () {
			let indicatorTop = document.querySelectorAll('.top-indicator-service')
			let indicatorBottom = document.querySelectorAll('.bottom-indicator-service')

			indicatorTop.forEach(btn => btn.classList.remove('indicator-top-active-service'));
			indicatorTop[i].classList.add('indicator-top-active-service')

			indicatorBottom.forEach(btn => btn.classList.remove('indicator-bottom-active-service'));
			indicatorBottom[i].classList.add('indicator-bottom-active-service')
		})
	}
</script>

<script>
	function openTabOrder(evt, tabName) {
		let i, tabcontent;
		tabcontent = document.getElementsByClassName("content-tab-service");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		document.getElementById(tabName).style.display = "block";
	}

	let linkService2 = document.querySelectorAll(".button-indicator");
	let tabService2 = document.querySelectorAll(".content-tab-service");
	for (let i = 0; i < linkService2.length; i++) {
		let iTab = tabService2[i].getAttribute('data-tab')
		linkService2[i].addEventListener("click", function () {
			openTabOrder("click", iTab)
		})
	}


	function dynamicClass(grupBtn, dynamicClass) {
		let buttons = document.querySelectorAll(grupBtn);
		buttons.forEach(button => {
			button.addEventListener('click', function () {
				buttons.forEach(btn => btn.classList.remove(dynamicClass));
				this.classList.add(dynamicClass);
			});
		});
	}

	dynamicClass('.button-indicator', 'active-btn-service')

	let navLinksService2 = document.querySelectorAll('.button-indicator')
	for (let i = 0; i < navLinksService2.length; i++) {
		navLinksService2[i].addEventListener("click", function () {
			let indicatorTop = document.querySelectorAll('.top-indicator-service')
			let indicatorBottom = document.querySelectorAll('.bottom-indicator-service')

			indicatorTop.forEach(btn => btn.classList.remove('indicator-top-active-service'));
			indicatorTop[i].classList.add('indicator-top-active-service')

			indicatorBottom.forEach(btn => btn.classList.remove('indicator-bottom-active-service'));
			indicatorBottom[i].classList.add('indicator-bottom-active-service')
		})
	}
</script>

<script>
	/**
	 * WINDOWS ONLOAD CLICK FIRST BUTTON
	 */
	window.onload = function () {
		let firstBtnService = document.getElementById('nav-btn-service')
		if (firstBtnService !== null) {
			firstBtnService.children[0].children[0].children[0].click()
		}
	}

	/**
	 * REPLACE PATH UPLOAD FILE
	 */
	let inputFile = document.getElementById('upload-file-brief')
	if (inputFile !== null) {
		inputFile.onchange = function () {
			document.getElementById('text-file-brief').innerText = this.value.replace(/.*[\/\\]/, '')
		};
	}
</script>

<script>
	/**
	 * FUNCTION CHANGE TAB DEFAULT
	 * @param buttonTabs
	 * @param contentTabs
	 * @param activeBtns
	 * @param activeTabs
	 */
	// function defaultChangeTab(buttonTabs, contentTabs, activeBtns, activeTabs) {
	// 	let btnTab = document.querySelectorAll(buttonTabs)
	// 	let contentTab = document.querySelectorAll(contentTabs)
	//
	// 	if (btnTab !== null && contentTab !== null) {
	// 		for (let i = 0; i < btnTab.length; i++) {
	// 			btnTab[i].addEventListener('click', function () {
	// 				btnTab.forEach(btn => {
	// 					btn.classList.remove(activeBtns)
	// 				})
	//
	// 				contentTab.forEach(btn => {
	// 					btn.classList.remove(activeTabs)
	// 				})
	//
	// 				btnTab[i].classList.add(activeBtns)
	// 				contentTab[i].classList.add(activeTabs)
	// 			})
	// 		}
	// 	}
	// }
	//
	// defaultChangeTab('.btn-tab-brief', '.content-tab-brief', 'active-btn-brief', 'active-tab-brief')
	// defaultChangeTab('.btn-tab-article', '.content-tab-article', 'active-btn-article', 'active-tab-article')
</script>

</body>
</html>
