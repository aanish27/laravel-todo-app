## Migration Erron in new setup
its coming from the foreign key constraint in the user table and project table
drop the foriegn keys

public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['task_id']);
        $table->dropForeign(['project_id']); // Using array notation for the column name
        // Alternatively, if you know the constraint name:
        // $table->dropForeign('posts_user_id_foreign');
    });
}

public function down()
{
    Schema::table('posts', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

