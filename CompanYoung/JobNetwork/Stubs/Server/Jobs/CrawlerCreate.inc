<?php
if(false === empty($row['post'])):

$row['output'] = $row['post'];

$row['output']['countries'] 		= array_column($row['output']['countries'], 'id');
$row['output']['types'] 			= array_column($row['output']['types'], 'id');

$row['output']['geographies'] 		= array_column($row['output']['geographies'], 'id');
$row['output']['positions'] 		= array_column($row['output']['positions'], 'id');

$row['output']['company'] 			= $row['output']['company']['name'];
?>
<script type="text/javascript">
	var geographies = <?= json_encode($row['output']['geographies'], JSON_NUMERIC_CHECK); ?>;
	var positions = <?= json_encode($row['output']['positions'], JSON_NUMERIC_CHECK); ?>;
</script>
<?php
else:
$row['output'] = array_merge($data['output'], $row);
$row['output']['text'] = $row['stripped_description'];
$row['output']['html']	= $row['original_description'];
endif;
?>


<nav class="page-nav scrollable gray small-h">
	<a class="active"><?= $row['output']['title']; ?></a>
</nav>
<div class="secondary-nav scrollable gray small-h">
	<a>< <?= trans('general.back_to_management'); ?></a>
</div>

<div class="scroller scrollable gray big">
	<div class="wrapper container-fluid">

		<div class="row">
			<div class="content col-md-10">

				<form id="crawler-form" class="form-horizontal" role="form" method="POST">
					<input id="item-id" name="crawler_result_id" type="hidden" value="<?= $row['id']; ?>">

					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label first-label"><?= trans('general.source'); ?>:</label>
							<div class="col-sm-8 control-value first-value">
								<span>
									<?= $row['crawler']['media']['name']; ?>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="job-url"><?= trans('general.job_url'); ?>:</label>
							<div class="col-sm-8 control-value">
								<a id="job-url" class="btn-link" href="<?= $row['application_link']; ?>" target="_blank"><?= trans('general.link_to_post'); ?></a>
							</div>
						</div>
					</div>



					<div class="col-md-12 border">
						<div class="form-group row">
							<label class="col-sm-2 control-label" for="title"><?= trans('general.title'); ?>:</label>
							<div class="col-sm-10 control-value">
								<input id="title" name="title" type="text" class="form-control" placeholder="Skriv en titel" value="<?= $row['output']['title']; ?>">
							</div>
						</div>
					</div>
					<div class="col-md-12 border crawler-logo">
						<div class="form-group row">
							<div class="col-sm-2">
								<img id="crawler_logo_preview" src="http://placehold.it/100x100" alt="your image" />
							</div>
							<div class="col-sm-2">
								<input type='file' id="crawler_logo" name="crawler_logo" />
							</div>
						</div>
					</div>


					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="countries"><?= trans('general.country'); ?></label>
							<div class="col-sm-8 control-value">
								<?= view('partials.country', [ 'countries' => $data['countries'], 'post' => $row['output'] ])->render(); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="types"><?= trans('general.type'); ?></label>
							<div class="col-sm-8 control-value">
								<?= view('partials.type', [ 'types' => $data['types'], 'post' => $row['output'] ])->render(); ?>
							</div>
						</div>
					</div>


					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="geographies"><?= trans('general.geographies'); ?></label>
							<div class="col-sm-8 control-value">
								<select id="geographies" class="form-control" name="geographies[]" multiple="multiple" style="height: 310px;">

								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="positions"><?= trans('general.category'); ?></label>
							<div class="col-sm-8 control-value">
								<select id="positions" class="form-control" name="positions[]" multiple="multiple" style="height: 310px;">

								</select>
							</div>
						</div>
					</div>





					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="hiring-method-id"><?= trans('general.hiring_method'); ?></label>
							<div class="col-sm-8 control-value">
								<?= view('partials.hiring_method', [ 'hiringMethods' => $data['hiringMethods'], 'post' => $row['output'] ])->render(); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="hired-at"><?= trans('general.hired_at'); ?></label>
							<div class="col-sm-8 control-value">
								<input id="hired-at" type="date" class="form-control" name="hired_at" value="<?= $row['output']['hired_at'] ?>" placeholder="Choose date">
								<span class="hired-at-value"></span>
							</div>
						</div>
					</div>


					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="deadline-method-id"><?= trans('general.deadline_method'); ?></label>
							<div class="col-sm-8 control-value">
								<?= view('partials.deadline_method', [ 'deadlineMethods' => $data['deadlineMethods'], 'post' => $row['output'] ])->render(); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="deadline-at"><?= trans('general.deadline_at'); ?></label>
							<div class="col-sm-8 control-value">
								<input id="deadline-at" type="date" class="form-control" name="deadline_at" value="<?= $row['output']['deadline_at'] ?>" placeholder="Choose date">
								<span class="deadline-at-value"></span>
							</div>
						</div>
					</div>


					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="zipcode"><?= trans('general.zipcode'); ?></label>
							<div class="col-sm-8 control-value">
								<input id="zipcode" type="text" class="form-control" name="zipcode" value="<?= $row['output']['zipcode'] ?>" placeholder="Zipcode">
							</div>
						</div>
					</div>
					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="city"><?= trans('general.city'); ?></label>
							<div class="col-sm-8 control-value">
								<input id="city" type="text" class="form-control" name="city" value="<?= $row['output']['city'] ?>" placeholder="City">
							</div>
						</div>
					</div>


					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="company-suggestion"><?= trans('general.company_suggestion'); ?>:</label>
							<div class="col-sm-8 control-value">
								<input type="text" class="form-control" id="company-suggestion" value="<?= $row['output']['company']; ?>" disabled="disabled">
							</div>
						</div>
					</div>
					<div class="col-md-6 border">
						<div class="form-group row">
							<label class="col-sm-4 control-label" for="company-id">
								<?= trans('general.company'); ?>
								<img id="company-logo" class="img-circle" src="//<?= getenv('IMAGE_DOMAIN'); ?>/companies/pictures/logos/fit/50/default.png" data-original="//<?= getenv('IMAGE_DOMAIN'); ?>/companies/pictures/logos/fit/50/default.png">
							</label>
							<div class="col-sm-8 control-value">
								<div class="auto-complete">
									<input id="company-id" type="hidden" name="company_id">
									<input id="company-name" type="text" class="form-control" name="company_name" value="<?= $row['output']['company']; ?>" placeholder="Who is the company?" autocomplete="off" data-url="/companies/autocomplete/name" data-pick="companyPick" data-loop="companyLoop" data-reset="companyReset"  data-input="companyInput" data-new="/companies/create/company-info">
									<div class="results">

									</div>
								</div>
							</div>
						</div>
					</div>


					<?php if(false === empty($row['similar'])): ?>

					<div class="col-md-12 border">
						<div style="padding:12px 16px;">
							<h4><?= trans('general.similar_jobs_in_database'); ?></h4>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group row" style="border:0;">
							<table class="table">
								<thead>
									<tr>
										<th data-sort="company" data-direction="desc">
											<span><?= trans('general.company'); ?></span> <span class="caret"></span>
										</th>
										<th data-sort="titel" data-direction="desc">
											<span><?= trans('general.titel'); ?></span> <span class="caret"></span>
										</th>
										<th data-sort="region" data-direction="desc">
											<span><?= trans('general.region'); ?></span> <span class="caret"></span>
										</th>
										<th data-sort="position" data-direction="desc">
											<span><?= trans('general.position'); ?></span> <span class="caret"></span>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($row['similar'] as $post): ?>
									<tr>
										<td>
											<?= $post['company']['name']; ?>
										</td>
										<td>
											<?= $post['title']; ?>
										</td>
										<td>
										<?php foreach($post['geographies'] as $geography): ?>
											<?= $geography['name']; ?>
										<?php endforeach; ?>
										</td>
										<td>
											<?php foreach($post['positions'] as $position): ?>
												<?= $position['name']; ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>

					<?php endif; ?>


					<div style="padding:0 16px;">
						<div class="col-md-12">
							<h4 style="padding: 16px 0px 12px 0px;font-weight: 300;"><?= trans('general.job_text'); ?></h4>
						</div>

						<div class="col-md-12">
							<textarea name="html" id="html"><?= $row['output']['html']; ?></textarea>
						</div>

						<div class="col-md-12">
							<div class="pull-right" style="padding:0 0 32px 0;">
								<?php
								if(false === empty($row['post'])):
								?>
									<button type="button" id="btn-delete" class="btn btn-danger"><?= trans('general.delete'); ?></button>
									<button type="button" id="btn-save-changes" class="btn btn-primary"><?= trans('general.save_changes'); ?></button>
								<?php
								else:
								?>
									<button type="button" id="btn-cancel" class="btn btn-default"><?= trans('general.cancel'); ?></button>
									<button type="button" id="btn-activate" class="btn btn-primary"><?= trans('general.activate_job'); ?></button>
								<?php
								endif;
								?>

							</div>
						</div>
					</div>

				</form>

			</div>
		</div>

	</div>
</div>
