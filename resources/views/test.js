async function foo() {
    let resp = await fetch("http://127.0.0.1:8000/sanctum/csrf-cookie/");
    let res = await resp.text()
    if (res) {
        // return res;
        // console.log(res);
    }
}

foo().then((res) => {
    console.log(res)
    func(res).then(res => {
        bar().then(res => {

            console.log(res);
        })

        console.log(res);

    })
})


async function bar() {
    let resp = await fetch("http://127.0.0.1:8000/api/dom")
    let res = await resp.text()
    if (res) {
        console.log(res);
        return res
    }
}
async function func() {
    let resp = await fetch("http://127.0.0.1:8000/login", {
        method: "POST",
        body: JSON.stringify({
            email: "name@name.name",
            password: "name@name.name",
        }),
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Referer: "http://127.0.0.1:8000",
        },
    });
    let res = await resp.json();
    if (res) {
        return res
    }
} 