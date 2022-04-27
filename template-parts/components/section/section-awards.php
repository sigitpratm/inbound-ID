<div class="py-16 md:py-28 relative block space-y-6 xl:space-y-12 2xl:space-y-24">
	<!-- heading -->
	<div class="space-y-4">
		<p class="font-bold text-center text-4xl md:text-5xl text-scheme-green">
			<?= emk_options( 'home-awards-title' ) ?>
		</p>
	</div>

	<!-- body -->
	<div class="w-full overflow-x-hidden flex flex-row">

		<div class="card-slider w-full flex-none overflow-hidden">

			<!-- parent card awards -->
			<div class="w-full grid grid-cols-2 md:grid-cols-10 gap-6 md:gap-20" data-award="publish"
			     data-award-empty="Belum ada postingan">
				<?php // filled by JS ?>
			</div>

		</div>
	</div>
</div>
