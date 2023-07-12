import prisma from "../client";
import { IUser } from "~/types/IUser";
import { User } from "@prisma/client";

export async function getUserByEmail(email: string): Promise<IUser|null> {
    return await prisma.user.findUnique({
      where: {
        email: email
      },
      select: {
        id: true,
        username: true,
      }
    })
  }

export async function getUserByUserName(username: string) {
    return await prisma.user.findUnique({
    where: {
        username: username,
    },
    select: {
        id: true,
        username: true,
    },
    })
}

export async function createUser(data: IUser) {
    const user = await prisma.user.create({
        data: {
            username: data.username,
            name: data.name,
            email: data.email,
            loginType: data.loginType,
            password: data.password,
            phone: data.phone,
        }
    })
    return user
}

