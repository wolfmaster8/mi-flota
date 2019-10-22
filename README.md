# Mi Flota

## Flujo del proyecto
Estos son los pasos para desarollar cada historia.
1. Crear un branch a partir de development: `git checkout -b feature/MFXX development`. Siendo XX el número de la issue de Github.
2. Comenzar a desarrollar la historia. Siempre después de trabajar, sin importar si terminamos o no, debemos hacer commit. Para ello >
    * `git status` para ver los archivos que queremos subir.
    * Si todos los archivos se pueden subir: `git add .`. No olvidar el punto :)
    * Si no se pueden subir todos los archivos: `git add archivo.html otro_archivo.css` y colocamos todos los archivos que necesitemos subir.
    * Después de hacer git add debemos hacer un commit. `git commit -m "xxx"`. Siendo xxx el mensaje del commit, por ejemplo: "Añado página de login" o "Corrige bug que impide hacer login".
    * Aquí ya tenemos el paquete preparado para mandar a GitHub. Para subirlo a la "nube": `git push`. A veces saldrá un mensaje del tipo:
        * To push the current branch and set the remote as upstream, use...
        * Aquí es solo copiar el código que nos da abajo y ejecutarlo en la consola: ` git push --set-upstream origin XXX`. Siendo XX el nombre del branch.
        
3. Cuando terminen de desarrollar, deben crear un pull request. En la interfaz de github.com van a "branches". Ahí saldrá la lista de los branches abiertos.
4. Al lado del branch que queremos "mergear", saldrá un botón "New pull request". Hacemos clic ahí.
5. Nos pedirá elegir hacia cual branch hacer el merge. SIEMPRE ELEGIR como base `development`.
6. En el comentario colocar así `Closes #x`. Siendo x el número de la issue.
7. Y listo!