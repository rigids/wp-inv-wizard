<?php


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<?php 

						/*
						*  Query posts for a relationship value.
						*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
						*/

						$clients = get_posts(array(
							'post_type' => 'client',
							'meta_query' => array(
								array(
									'key' => 'invoice', // name of custom field
									'value' => '"' . get_the_ID() . '"', 
									'compare' => 'LIKE'
								)
							)
						));

						?>
						<?php if( $clients ): ?>
							<div>
							<?php foreach( $clients as $client ): ?>					
								<h2><?php echo get_the_title( $doctor->ID ); ?></h2>
							<?php endforeach; ?>
							</div>
						<?php endif; ?>

					

					<p>Invoice No: <?php the_field('invoice_number'); ?></p>  			
					<p>Status: <?php the_field('status'); ?></p>
					<p id="dateOfIssue"></p> 
					<p id="dueDate"></p>

					<?php

					// check if the repeater field has rows of data
					if( have_rows('line_item') ):

						?>
						<table class="invoice">	
							<tr><th>Task</th><th>Rate</th><th>Hours</th><th>Total</th></tr>
					<?php
					 	// loop through the rows of data
					    while ( have_rows('line_item') ) : the_row();
					       		echo '<tr>';
					      		// display a sub field value
						        echo '<td>';
						        the_sub_field('task');
						        echo '</td><td>';
						        the_sub_field('rate');
						        echo '</td><td>';
						        the_sub_field('hours');
						        echo'</td><td>';
						        the_sub_field('total');
						        echo '</td><tr>';
					    endwhile;
					  ?>

					  <tr class='tableTotalRow'><th>Invoice Total</th><th></th><th></th><th>
					  <?php the_field('invoice_total');?>
					  </th>
					  </table>
					  <?php
					else :

					    // no rows found

					endif;

					?>


				</article>
			<?php
			// End the loop.
			endwhile;
			?>


		<script>
			var issued = moment('<?php the_field('date_of_issue');?>');
			var due = moment('<?php the_field('due_date');?>');

		 	var dateIssuedSpan = document.querySelectorAll('#dateOfIssue');
	 		dateIssuedSpan[0].innerText = "Date of Issue: " + issued.format('MMMM D YYYY');

	 		var dueDateSpan = document.querySelectorAll('#dueDate');
	 		dueDateSpan[0].innerText = "Due Date: " + issued.format('MMMM D YYYY');
	
		</script>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
