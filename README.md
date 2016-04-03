
## Creating the database

```
/usr/bin/sqlite3 data/rift.db < init.sql
```

**To refresh**
```
rm data/rift.db;
/usr/bin/sqlite3 data/rift.db < init.sql;
chmod 777 data/rift.db
```
