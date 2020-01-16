import { registerPlugin } from "@wordpress/plugins";
import { __ } from "@wordpress/i18n";
import { SelectControl  } from "@wordpress/components";
import { withSelect, withDispatch } from "@wordpress/data";

const { PluginDocumentSettingPanel } = wp.editPost;

let PrimaryCategoryMetaFields = (props) => {
	let options = [{ value: null, label: __( 'Select primary category:' ) }];
	if (props.categories) {
		let categories = props.categories.map(category => ({ value: category.id, label: category.name }));
		options = [...options, ...categories];
	}
	return (
		<>
			<SelectControl
				label={ __( 'Select primary category:' ) }
				value={ props.selectedPrimaryCategoryId }
				onChange={(value) => props.onMetaFieldChange(value)}
				options={ options }
			/>
		</>
	)
};

PrimaryCategoryMetaFields = withSelect(
	(select) => {
		const categoriesArgs = {
			per_page: -1,
			orderby: 'name',
			status: 'publish'
		};
		return {
			selectedPrimaryCategoryId: select('core/editor').getEditedPostAttribute('meta')['_primary_category_id'],
			categories: select('core').getEntityRecords('taxonomy', 'category', categoriesArgs)
		}
	}
)(PrimaryCategoryMetaFields);

PrimaryCategoryMetaFields = withDispatch(
	(dispatch) => {
		return {
			onMetaFieldChange: (value) => {
				dispatch('core/editor').editPost({meta: {_primary_category_id: value}})
			}
		}
	}
)(PrimaryCategoryMetaFields);

const PrimaryCategorySettingPanel = () => (
	<PluginDocumentSettingPanel
		name="primary-category"
		title="Primary Category"
		className="primary-category"
	>
		<PrimaryCategoryMetaFields />
	</PluginDocumentSettingPanel>
);
registerPlugin('primary-category-setting-panel', { render: PrimaryCategorySettingPanel, icon: '' } );
