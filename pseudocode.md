CRUD Operations for the facebook for heroes

create - hero, ability, arch nemesis, rival, sidekick, love interest, parents

Read - all heroes, heroes that have the flying ability, relationship type, love triangles [reading records in the data base, out of multiple tables  (related)]

update - heroes bio, new abilities, lose abilities, wins/loses(battles), sidekicks [modifies an existing record, where condioton- id + immutable number]

delete- cascade and delete the base or a soft delete [delete the record, where condition - id = immutable number]

Actions:

ADD a Hero

Make a relationship between two heroes

Add a relationship type

Add a new ability

assign or link an existing abiolity to a hero (ability id, hero id)

modify existing relationship between heroes 

function: 

getAllHeroes -conn params, JSON formatted list of all heroes 

getHeroById - conn, heroID, Json formatted list of the specific hero
