<div class="flex flex-col w-full min-h-screen py-24">
	<div class="w-full max-w-[1360px] mx-auto min-h-screen xl:pt-20 space-y-20">
		<div class="w-full max-w-4xl space-y-10 mx-auto">
			<h1 class="lg:text-5xl text-[#3D9E26] font-bold text-center">OUR PROGRAMS</h1>
			<p class="text-center text-base">Sharing is caring! While we share our expertise to your brand and business, we also love to share our care, knowledge and story to the community, to the people and neighborhood we live in.</p>
		</div>

		<?= get_template_part(
				'template-parts/components/section/section',
				'default-podcast',
				[
//						"classes"=> [
//								"card"=>"grid grid-cols-12 xl:gap-20 justify-between pb-10",
//								"section-1"=> "col-span-7 min-h-[420px] bg-gray-200 rounded-xl",
//								"section-2"=> "col-span-5 pr-10"
//						],
						"position"=> "left",
						"data"=> [
								"with_icon" => false,
								"images" => "http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_332-300x201.png",
//								"images_classes" => "w-full h-full rounded-3xl relative overflow-hidden",
								"icon" => null,
								"title" => "REBOUND \nPodcast by InboundID",
								"title_classes"=> "text-4xl font-extrabold text-[#3D9E26] leading-tight",
								"description_classes"=> "w-3/4",
								"description" => "Rebound Podcast is a bi-weekly casual talk that not only reveals the insight and trend in digital but also quirky sides of digital life and challenging agency life.", //Lorem ipsum dolor sit amet
								"btn_url" => "/",
								"btn_text" => "Listen on Spotify"
						]
				]
		); ?>

		<div class="block relative xl:space-y-10 pb-20">
			<div class="w-full">
				<h2 class="lg:text-3xl text-[#3D9E26] font-extrabold text-center">OUR MOST LISTENED PODCASTS</h2>
			</div>
			<div class="w-full grid grid-cols-4 xl:gap-6 emk-podcast" data-podcast="listened" data-podcast-empty="Belum ada item">
				<?php // ini biarin kosong udah di handle sama js ?>
			</div>
		</div>

		<?= get_template_part(
				'template-parts/components/section/section',
				'default-podcast',
				[
						"classes"=> [
							"card"=>"grid grid-cols-12 xl:gap-20 justify-between pb-14",
							"section-1"=> "col-span-7 min-h-[420px] bg-gray-200 rounded-xl",
							"section-2"=> "col-span-5 pr-10"
						],
						"position"=> "right",
						"data"=> [
								"with_icon" => false,
								"images" => "http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_333-300x192.png",
								"images_classes" => "w-full h-full rounded-3xl relative overflow-hidden",
								"icon" => null,
								"title" => "REBOUND TALK",
								"title_classes"=> "text-6xl font-extrabold text-[#3D9E26] leading-tight",
								"description_classes"=> "w-full",
								"description" => "Get updates about the digital marketing world and the know-how through in-depth discussions with experts.", //Lorem ipsum dolor sit amet
								"btn_url" => "/",
								"btn_text" => "Watch on YouTube"
						]
				]
		); ?>

		<div class="block relative xl:space-y-10 pb-20">
			<div class="w-full">
				<h2 class="lg:text-3xl text-[#3D9E26] font-extrabold text-center">THE MOST WATCHED SESSIONS</h2>
			</div>
			<div class="w-full grid grid-cols-4 xl:gap-6" data-podcast="watched" data-podcast-empty="Belum ada item">
				<?php
				// ini biarin kosong udah di handle sama js
				?>
			</div>
		</div>

		<?= get_template_part(
				'template-parts/components/section/section',
				'default-podcast',
				[
//						"classes"=> [
//								"card"=>"grid grid-cols-12 xl:gap-20 justify-between pb-14",
//								"section-1"=> "col-span-7 min-h-[420px] bg-gray-200 rounded-xl",
//								"section-2"=> "col-span-5 pr-10"
//						],
						"position"=> "left",
						"data"=> [
								"with_icon" => true,
								"images" => "http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_335-300x189.png",
								"images_classes" => "w-full h-full rounded-3xl relative overflow-hidden",
								"icon" => "http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_334-300x127.png",
								"icon_classes"=> "h-[150px] object-contain",
								"title" => "REBOUND TALK",
								"title_classes"=> "text-6xl font-extrabold text-[#3D9E26] leading-tight",
								"description_classes"=> "w-full",
								"description" => "Miracles is InboundID social program and movement with the main focus on giving back to the community through series of collaborative social events with our partner. A program to share the kindness that can bring miracles to many.", //Lorem ipsum dolor sit amet
						]
				]
		); ?>


		<div class="block relative w-full mx-auto max-w-5xl xl:space-y-10 pb-20">
			<div class="w-full">
				<h2 class="lg:text-3xl text-[#3D9E26] font-extrabold text-center">OUR MIRACLES PROGRAMS</h2>
			</div>
			<div class="w-full grid grid-cols-2 xl:gap-10">
				<div class="col-span-1 rounded-3xl overflow-hidden">
					<img src="http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_337-300x129.png" alt="img"
						 class="w-full object-contain">
				</div>
				<div class="col-span-1 rounded-3xl overflow-hidden">
					<img src="http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_338.png" alt="img"
						 class="w-full object-contain">
				</div>
			</div>

			<div class="w-full space-y-10 flex flex-col justify-center text-center xl:w-4/6 mx-auto">
				<p class="text-sm md:text-base lg:text-lg">Our collaboration with Jakpreneur, small & medium business owners, Indonesian graphic designers and art directors to create 12 logos for 12 SMEs to support their creative promotion.</p>
				<div>
					<a href="" rel="nofollow" class="px-6 xl:px-14 py-4 bg-[#3D9E26] shadow-lg rounded-full text-white font-semibold">See More</a>
				</div>
			</div>
		</div>


		<?= get_template_part(
				'template-parts/components/section/section',
				'default-podcast',
				[
						"classes"=> [
								"card"=>"grid grid-cols-12 xl:gap-20 justify-between pb-14",
								"section-1"=> "col-span-7 min-h-[420px] bg-gray-200 rounded-xl",
								"section-2"=> "col-span-5 pr-10"
						],
						"position"=> "right",
						"data"=> [
								"with_icon" => true,
								"images" => "http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_335-300x189.png",
								"images_classes" => "w-full h-full rounded-3xl relative overflow-hidden",
								"icon" => "http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_336-300x96.png",
								"icon_classes"=> "h-[100px] object-contain",
								"description_classes"=> "w-full",
								"description" => "Digital marketing academy for professionals who wants to improve their skills in digital marketing, fresh graduates who wants to kickstart their careerr in digital marketing and college students who wants to gain knowledge about digital marketing.",
								"btn_url" => "/",
								"btn_text" => "Visit the Website"
						]
				]
		); ?>


		<div class="block relative xl:space-y-10 pb-20">
			<div class="w-full">
				<h2 class="lg:text-3xl text-[#3D9E26] font-extrabold text-center">PREVIOUS CLASSES:</h2>
			</div>
			<div class="w-full grid grid-cols-4 xl:gap-6" data-podcast="classes" data-podcast-empty="Belum ada item">
				<?php
				// ini biarin kosong udah di handle sama js
				?>
			</div>
		</div>




	</div>
</div>
