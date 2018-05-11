<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>\n"; ?>

	<div class="control-group adv-search">
			<input id="<?php echo $this->modelClass?>_search_value" class="span5" type="text" name="<?php echo $this->modelClass?>[search_value]" maxlength="100">

			<select id="<?php echo $this->modelClass?>_search_key" class="span5" name="<?php echo $this->modelClass?>[search_key]">
				<option value="all">All</option>
				<?php foreach($this->tableSchema->columns as $column): ?>
				<?php
					$field=$this->generateInputField($this->modelClass,$column);
					if(strpos($field,'password')!==false)
						continue;
				?>
				<option value="<?php echo $column->name?>"><?php echo $column->name?></option>
				<?php endforeach; ?>
			</select>
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
