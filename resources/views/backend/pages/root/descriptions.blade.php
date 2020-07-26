
<div class="col-sm-12 pt-1 br-4" style="height: 100%; background-color: #e5e5e5; width: 100%;">
	<h4 class="d-block text-center text-theme bg-white br-2">Description</h4>
	<span class="detail_">
		<span id="detail_container"></span>
		<span class="description_container" style="display: none;">
			<ul class="pl-3 mb-0">
				<li>Add <a href="{{ route('admin.menu.create') }}"><code>Sidebar Menu</code></a> and Give Access Permission to <a href="{{ route('admin.role.assign', 'super-admin') }}"><code>SuperAdmin</code></a>.</li>
				<li>Don't forget to<br>
					<ul class="pl-3">
						<li> run: <code> php artisan make:controller [controllerName]</code></li>
						<li> run: <code> php artisan make:model [modelName]</code></li>
						<li> run: <code> php artisan make:migration create_[tableName(s)]_table</code></li>
						<li> create: <code>public function [functionName]{ ... }</code> in controller and <code>return view('...', compact('<strong class="bg-warning py-1 px-2 br-2">rows</strong>'))</code></li>
					</ul>
				</li>
				<li>Create <code>Routes</code> First.</li>
			</ul>
		</span>
		<span class="description_fileType" style="display: none;">
			<ul class="pl-3 mb-0">
				<li><kbd>Index, Add & Edit</kbd> : Create <code>Index, Add & Edit </code> file. </li>
				<li><kbd>Index, Add, Edit & View</kbd> : Create <code>Index, Add, Edit & View </code> file. </li>
				<li><kbd>Modal</kbd> : Create <code>Modal </code> file. <small>[<i>Add & Edit in Modal</i>]</small></li>
				<li><kbd>Index</kbd> : Create <code>Index </code> file. </li>
				<li><kbd>Add</kbd> : Create <code>Add </code> file. </li>
				<li><kbd>Edit</kbd> : Create <code>Edit </code> file. </li>
				<li><kbd>View</kbd> : Create <code>View </code> file. <small>[<i>Single item view</i>]</small></li>
			</ul>
		</span>
		<span class="description_fileName" style="display: none;">
			<ul class="pl-3 mb-0">
				<li>Type File Name [say '<i><strong>filename</strong></i>'].<br> <code>i.e. <i><strong>filename</strong></i><span class="text-secondary">.blade.php</span></code><br><kbd>Note</kbd> : [<i>Just file name. Don't Input full name, like <code><span class="text-secondary">filename.blade.php</span></code></i>]</li>
			</ul>
		</span>
		<span class="description_fileDirectory" style="display: none;">
			<span class="alert alert-warning d-block text-center mb-1 px-0"><i class="fa fa-exclamation-triangle"></i> File will <strong>overwrite</strong> if exists<hr class="m-0 p-0"><code>Separate words with [space] or [_]</code><br></span>
			<ul class="pl-3 mb-0">
				<li><kbd>Index</kbd> : <code>views/backend/pages/<span class="fileDirectoryText font-weight-bold text-underline-wavy">[...]</span>/index.blade.php </code></li>
				<li><kbd>Add</kbd> : <code>views/backend/pages/<span class="fileDirectoryText font-weight-bold text-underline-wavy">[...]</span>/add.blade.php </code></li>
				<li><kbd>Edit</kbd> : <code>views/backend/pages/<span class="fileDirectoryText font-weight-bold text-underline-wavy">[...]</span>/edit.blade.php </code></li>
				<li><kbd>View</kbd> : <code>views/backend/pages/<span class="fileDirectoryText font-weight-bold text-underline-wavy">[...]</span>/view.blade.php </code></li>
				<li><kbd>Modal</kbd> : <code>views/backend/pages/<span class="fileDirectoryText font-weight-bold text-underline-wavy">[...]</span>/index.blade.php </code></li>
			</ul>
		</span>
		<span class="description_fafaOfSideMenu" style="display: none;">
			<ul class="pl-3 mb-0">
				<li><code>Paste</code> FontAwesome icon class name whitch is same as <code>Sidebar</code>.</li>
			</ul>
		</span>
		<span class="description_langFolderDirectory" style="display: none;">
			<ul class="pl-3 mb-0">
				<li><kbd>Language</kbd> : <code>lang/(bn/en)/<span class="langFolderDirectory font-weight-bold text-underline-wavy">[...]</span>/</code></li>
			</ul>
		</span>
		<span class="description_tagManagement" style="display: none;">
			<ul class="pl-3 mb-0">
				<li><i class="fafa-fafaOfSideMenu"></i> <code><span class="tagManagement_ font-weight-bold text-underline-wavy">[...] Management</span></code></li>
			</ul>
		</span>
		<span class="description_dashboardRoute" style="display: none;">
			<ul class="pl-3 mb-0">
				<li>Route of <code>Dashboard</code><br><kbd>Note</kbd> : [<i>Must create <code>Routes</code> first in <code>routes/web.php</code></i>]</li>
			</ul>
		</span>
		<span class="description_indexFileRoute" style="display: none;">
			<ul class="pl-3 mb-0">
				<li>Route of <code>views/backend/pages/<span class="fileDirectoryText font-weight-bold text-underline-wavy">[...]</span>/<strong>index</strong>.blade.php </code><br><kbd>Note</kbd> : [<i>Must create <code>Routes</code> first in <code>routes/web.php</code></i>]</li>
			</ul>
		</span>
		<span class="description_addNewButtonRoute" style="display: none;">
			<ul class="pl-3 mb-0">
				<li>Route of <code>views/backend/pages/<span class="fileDirectoryText font-weight-bold text-underline-wavy">[...]</span>/<strong>add</strong>.blade.php </code><br><kbd>Note</kbd> : [<i>Must create <code>Routes</code> first in <code>routes/web.php</code></i>]</li>
			</ul>
		</span>
		<span class="description_fafaCardHeader" style="display: none;">
			<ul class="pl-3 mb-0">
				<li><code>Paste</code> FontAwesome icon class name whitch will be placed in <code>Card Header</code>.</li>
			</ul>
		</span>
		<span class="description_makeController" style="display: none;">
			<ul class="pl-3 mb-0">
				<li><code class="text-default">Yes/No</code> Choose Wisely.<br>If <code>Yes</code>, be sure that <code>backend\<span class="getFileName font-weight-bold text-underline-wavy">[...]</span>Controller</code> does not exists already!</li>
			</ul>
		</span>
		<span class="description_makeMigration" style="display: none;">
			<ul class="pl-3 mb-0">
				<li><code class="text-default">Yes/No</code> Choose if needed.<br>If <code>Yes</code>, be sure that <code>[DateTime]_create_<span class="getFileName_ font-weight-bold text-underline-wavy">[...]</span>_table.php</code> does not exists already!</li>
			</ul>
		</span>
	</span>
</div>