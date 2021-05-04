//{block name="backend/Emotion/app" append}
Ext.define('Shopware.apps.nnwebEmotionBlur.store.BackgroundPositionStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Links",
		value : "nnwebEmotionBlur_hintergrund_position_links"		
	}, {
		id : 2,
		name : "Mitte",
		value : "nnwebEmotionBlur_hintergrund_position_mitte"
	}, {
		id : 3,
		name : "Rechts",
		value : "nnwebEmotionBlur_hintergrund_position_rechts"
	}]
});

Ext.define('Shopware.apps.nnwebEmotionBlur.store.HeadlineTagStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "H1",
		value : "h1"		
	}, {
		id : 2,
		name : "H2",
		value : "h2"
	}, {
		id : 3,
		name : "H3",
		value : "h3"
	}, {
		id : 4,
		name : "H3",
		value : "h3"
	}, {
		id : 5,
		name : "H4",
		value : "h4"
	}, {
		id : 6,
		name : "H5",
		value : "h5"
	}, {
		id : 7,
		name : "H6",
		value : "h6"
	}]
});

Ext.define('Shopware.apps.nnwebEmotionBlur.store.TextAlignStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Links",
		value : "left"		
	}, {
		id : 2,
		name : "Mitte",
		value : "center"
	}, {
		id : 3,
		name : "Rechts",
		value : "right"
	}, {
		id : 4,
		name : "Blocksatz",
		value : "justify"
	}]
});

Ext.define('Shopware.apps.nnwebEmotionBlur.store.LinkTargetStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Selbes Fenster",
		value : "_self"		
	}, {
		id : 2,
		name : "Neues Fenster",
		value : "_blank"
	}]
});

Ext.define('Shopware.apps.nnwebEmotionBlur.store.BoxAlignXStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Links",
		value : "box-left"		
	}, {
		id : 2,
		name : "Mitte",
		value : "box-center-x"
	}, {
		id : 3,
		name : "Rechts",
		value : "box-right"
	},]
});

Ext.define('Shopware.apps.nnwebEmotionBlur.store.BoxAlignYStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Oben",
		value : "box-top"		
	}, {
		id : 2,
		name : "Mitte",
		value : "box-center-y"
	}, {
		id : 3,
		name : "Unten",
		value : "box-bottom"
	},]
});

Ext.define('Shopware.apps.nnwebEmotionBlur.store.HoverVisibilityStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Immer",
		value : "always"		
	}, {
		id : 2,
		name : "Beim Darüberfahren mir der Maus",
		value : "hover"
	}, {
		id : 3,
		name : "Nie",
		value : "never"
	},]
});
// {/block}
