<?php if (!isset($actions)) $actions = [] ?>

<article id="goal-<?php echo $goal->code ?>" style="background-color:gold; padding:0 5px 5px 5px; margin:5px;">
	<h1><?php echo htmlspecialchars($goal->title) ?>
	- <span class="kudos"><?php echo $goal->kudos ?> Kudos</span>
	<?php if (!empty($goal->achieved)): ?>
	<span style="color:green; margin-left:10px">✓</span>
	<?php elseif (isset($goal->progress)): ?>
	<progress title="<?php echo $goal->progress->current ?> / <?php echo $goal->progress->target ?>" max="<?php echo $goal->progress->target ?>"
		value="<?php echo $goal->progress->current ?>" style="margin-left:10px"></progress>
	<?php endif ?>
	</h1>

	<?php echo htmlspecialchars($goal->short_description) ?>

	<?php if (count($goal->professions) > 0): ?>
	<h2><?php echo $h->text('goal.associated_professions.title') ?></h2>
	<ul>
		<?php foreach ($goal->professions as $profession_key => $profession): ?>
		<li><a href="<?php echo $h->pageUrl('Special:Professions') ?>#profession-<?php echo $profession_key ?>"><?php echo $profession->title ?></a></li>
		<?php endforeach ?>
	</ul>
	<?php endif ?>

	<?php if ($goal->achieved && in_array('revoke', $actions)): ?>
	<a data-redirect="/" href="/api.php?action=liquigoals.revoke_achievement&user_id=<?php echo $user->getId() ?>&goal_id=<?php echo $goal->id ?>">Revoke</a>
	<?php endif ?>
</article>